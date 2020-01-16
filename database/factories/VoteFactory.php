<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Review;
use App\Models\User;
use App\Models\Vote;
use Faker\Generator as Faker;

$factory->define(Vote::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'review_id' => Review::all()->random()->id,
        'type' => mt_rand(0,1) == 0 ? 'DISLIKE' : 'LIKE',
    ];
});
