<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bathroom;
use Faker\Generator as Faker;

$factory->define(Bathroom::class, function (Faker $faker) {
    return [
        'name' => 'Bathroom ' . $faker->numberBetween(1, 3),
        'bath_count' => $faker->numberBetween(0, 1),
        'shower_count' => $faker->numberBetween(0, 1),
        'wc_count' => $faker->numberBetween(1, 2),
    ];
});
