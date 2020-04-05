<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BookAuthor;
use App\Models\Book;
use App\Models\Author;
use Faker\Generator as Faker;

$factory->define(BookAuthor::class, function (Faker $faker) {
    return [
        'book_id' => Book::all()->random()->id,
        'author_id' => Author::all()->random()->id,
    ];
});
