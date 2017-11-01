<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Scholarship::class, function (Faker $faker) {
    return [
        'benefits' => implode('|', $faker->words),
        'requirements' => implode('|', $faker->words),
        'other_information' => $faker->text,
        'courses' => implode('|', $faker->words),

        'number_of_seats' => $faker->numberBetween($min = 1, $max = 100),
        'application_deadline' => $faker->dateTimeBetween($startDate = '+3 months', $endDate = '+1 years'),
        'scholarship_type' => $faker->randomElement($array = ['full', 'partial']),
        'student_type' => $faker->randomElement($array = ['undergraduate', 'graduate']),
    ];
});
