<?php

namespace App\CustomTNTSearch\Console;

use Illuminate\Console\Command;
use Illuminate\Contracts\Events\Dispatcher;
use TeamTNT\TNTSearch\TNTSearch;

class ImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customtntsearch:import {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the given model into the search index';

    /**
     * Execute the console command.
     *
     * @param \Illuminate\Contracts\Events\Dispatcher $events
     *
     * @return void
     */
    public function handle(Dispatcher $events)
    {
        $class = $this->argument('model');

        $model = new $class();
        $tnt = new TNTSearch();
        $driver = config('database.default');
        $config = config('scout.tntsearch') + config("database.connections.$driver");

        $tnt->loadConfig($config);
        $tnt->setDatabaseHandle(app('db')->connection()->getPdo());

        $indexNames = $model->customSearchableAs();
        for ($i = 0; $i < count($indexNames); $i++) {

            $indexer = $tnt->createIndex($indexNames[$i].'.index');
            $indexer->setPrimaryKey($model->getKeyName());
            $fields = implode(', ', array_keys($model->customToSearchableArray($i)));
            dd($model->customToSearchableArray($i));
    
            $query = "{$model->getKeyName()}, $fields";
    
            if ($fields == '') {
                $query = '*';
            }
    
            $indexer->query("SELECT $query FROM {$model->getTable()};");
            
            $indexer->run();
        }

        $this->info('All ['.$class.'] records have been imported.');
    }
}
