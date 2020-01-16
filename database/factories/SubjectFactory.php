<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Subject;
use Faker\Generator as Faker;

$factory->define(Subject::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
    ];
});
