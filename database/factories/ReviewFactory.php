<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'book_id' => Book::all()->random()->id,
        'user_id' => User::all()->random()->id,
        'comment' => $faker->realText($maxNbChars = 500, $indexSize = 2),
        'rate' => rand(1,5),
        'status' => 1,
    ];
});
