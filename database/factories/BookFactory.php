<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 2, $variableNbWords = true) ,
        'summary' => $faker->paragraphs($nb = 3, $asText = true),
        'image' => $faker->imageUrl($width = 640, $height = 480) ,
        'publisher_id' => Publisher::all()->random()->id,
        'author_id' => Author::all()->random()->id,
    ];
});
