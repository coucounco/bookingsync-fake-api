<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bedroom;
use Faker\Generator as Faker;

$factory->define(Bedroom::class, function (Faker $faker) {
    return [
        'name' => 'Bedroom ' . $faker->numberBetween(1, 10),
        'bunk_beds_count' => $faker->numberBetween(0, 2),
        'double_beds_count' => $faker->numberBetween(0, 2),
        'kingsize_beds_count' => $faker->numberBetween(0, 2),
        'queensize_beds_count' => $faker->numberBetween(0, 2),
        'single_beds_count' => $faker->numberBetween(0, 2),
        'sofa_beds_count' => $faker->numberBetween(0, 2),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});
