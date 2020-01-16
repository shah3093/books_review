<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    // return [
    //     'name' => $faker->name,
    //     'email' => "admin@admin.com",
    //     'email_verified_at' => now(),
    //     'user_type' => 3,
    //     'password' => bcrypt('12345678'), // password
    //     'remember_token' => Str::random(10),
    // ];
    
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'user_type' => 1,
        'status' => 1,
        'password' => bcrypt('12345678'), // password
        'remember_token' => Str::random(10),
        'phone' => $faker->e164PhoneNumber,
        'address' => $faker->address,
        'photo' => $faker->imageUrl($width = 640, $height = 480),
        'details' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
