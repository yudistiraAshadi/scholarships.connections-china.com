<?php

use Illuminate\Database\Seeder;

class UniversitiesAndScholarshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\University::class, rand($min = 10, $max = 50))
            ->create()
            ->each(function (App\University $university) {
                factory(App\Scholarship::class, rand($min = 1, $max = 10))
                    ->create([
                        'university_id' => $university->id,
                    ]);
            });
    }
}
