<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\University::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'logo' => $faker->imageUrl,
        'introduction' => $faker->optional()->text,

        // Address
        'country' => 'usa',
        'governing_district' => $faker->state,
        'major_municipality' => $faker->city,
        'minor_municipality' => 'district',
        'detailed_address' => $faker->streetName,

        // Other information
        'courses' => implode('|', $faker->words),
        'photos' => implode('|', 
            $faker->randomElements($array = [$faker->imageUrl, $faker->imageUrl], $count = 2)
        ),
    ];
});
