<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Models\University::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company,
        'logo' => $faker->imageUrl,
        'introduction' => $faker->optional()->text,

        // Address
        'country' => 'usa',
        'governing_district' => $faker->state,
        'major_municipality' => $faker->city,
        'minor_municipality' => $faker->streetName,
        'detailed_address' => $faker->streetAddress,

        // Other information
        'photos' => implode('|', 
            $faker->randomElements($array = [$faker->imageUrl, $faker->imageUrl], $count = 2)
        ),
    ];
});
