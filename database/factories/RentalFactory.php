<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Rental;
use Faker\Generator as Faker;

$factory->define(Rental::class, function (Faker $faker) {
    return [
        'absolute_min_price' => $faker->numberBetween(100, 200),
        'address1' => $faker->address,
        'address2' => $faker->secondaryAddress,
        'base_rate' => $faker->numberBetween(150, 160),
        'base_rate_kind' => 'weekly',
        'bathrooms_count' => $faker->numberBetween(1, 4),
        'bedrooms_count' => $faker->numberBetween(1, 8),
        'bookable_online' => $faker->boolean,
        'checkin_details' => [
            'en' => $faker->sentence,
            'fr' => $faker->sentence
        ],
        'checkout_details' => [
            'en' => $faker->sentence,
            'fr' => $faker->sentence
        ],
        'checkin_time' => 16,
        'checkout_time' => 10,
        'city' => $faker->city,
        'contact_name' => $faker->firstName . ' ' . $faker->lastName,
        'country_code' => $faker->countryCode,
        'currency' => $faker->currencyCode,
        'description' => [
            'en' => $faker->paragraph,
            'fr' => $faker->paragraph
        ],
        'downpayment' => $faker->numberBetween(30, 100),
        'final_price' => $faker->numberBetween(200, 400),
        'floor' => $faker->randomElement(['A', '1', '2', '3', '4', '5']),
        'headline' => [
            'en' => $faker->sentence(3),
            'fr' => $faker->sentence(3)
        ],
        'initial_price' => null,
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
        'max_price' => $faker->numberBetween(600, 800),
        'min_price' => $faker->numberBetween(450, 600),
        'name' => $faker->name,
        'nightly_rates_managed_externally' => false,
        'notes' => $faker->paragraph(5),
        'permit_number' => null,
        'position' => $faker->numberBetween(),
        'price_public_notes' => [
            'en' => $faker->sentence,
            'fr' => $faker->sentence
        ],
        'rental_type' => $faker->randomElement(['apartment', 'bed-and-breakfast', 'villa', 'chalet']),
        'reviews_average_rating' => $faker->randomFloat(2, 5),
        'reviews_count' => $faker->numberBetween(1, 200),
        'sleeps' => $faker->numberBetween(2, 10),
        'sleeps_max' => $faker->numberBetween(10, 20),
        'state' => null,
        'stories_count' => $faker->numberBetween(0, 10),
        'summary' => [
            'en' => $faker->sentence(15),
            'fr' => $faker->sentence(15)
        ],
        'surface' => $faker->numberBetween(50, 200),
        'surface_unit' => $faker->randomElement(['metric', 'imperial']),
        'website_url' => [
            'en' => $faker->url,
            'fr' => $faker->url,
        ],
        'zip' => $faker->postcode,
        'residency_category' => $faker->randomElement(['primary_residence', 'secondary_residence', 'non_residential']),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'published_at' => $faker->dateTime,
    ];
});
