<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Models\Scholarship::class, function (Faker $faker) {
    return [
        'benefits' => implode('|', $faker->words),
        'requirements' => implode('|', $faker->words),
        'other_information' => $faker->optional()->text,
        'program' => $faker->randomElement($array = ['Computer Science', 'International Business', 'Aeronautic Engineering']),

        'number_of_seats' => $faker->numberBetween($min = 1, $max = 100),
        'application_deadline' => $faker
            ->dateTimeBetween($startDate = '+3 months', $endDate = '+1 years')
            ->format('Y-m-d H:i:s'),
        
        'program_language_id' => $faker->numberBetween($min = 1, $max = 2),
        'scholarship_type_id' => $faker->numberBetween($min = 1, $max = 2),
        'degree_type_id' => $faker->numberBetween($min = 1, $max = 4),
    ];
});
