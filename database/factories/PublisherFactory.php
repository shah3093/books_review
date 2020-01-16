<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Publisher;
use Faker\Generator as Faker;

$factory->define(Publisher::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->companyEmail,
        'phone' => $faker->e164PhoneNumber,
        'address' => $faker->address,
        'details' => $faker->text,
    ];
});
