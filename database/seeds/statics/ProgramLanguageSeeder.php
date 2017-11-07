<?php

use Illuminate\Database\Seeder;

class ProgramLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = ['english', 'chinese'];

        foreach ($languages as $language) {
            DB::table('program_languages')->insert([
                'language' => $language,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        };
    }
}
