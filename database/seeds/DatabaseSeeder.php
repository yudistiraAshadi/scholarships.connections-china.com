<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DegreeTypeSeeder::class,
            ProgramLanguageSeeder::class,
            ScholarshipTypeSeeder::class,
            UniversitiesAndScholarshipsTableSeeder::class
        ]);
    }
}
