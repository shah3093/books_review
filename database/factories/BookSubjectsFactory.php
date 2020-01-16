<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Book;
use App\Models\BookSubjects;
use App\Models\Subject;
use Faker\Generator as Faker;

$factory->define(BookSubjects::class, function (Faker $faker) {
    return [
        'book_id' => Book::all()->random()->id,
        'subject_id' => Subject::all()->random()->id,
    ];
});
