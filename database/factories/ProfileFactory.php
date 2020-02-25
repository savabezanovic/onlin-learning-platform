<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use App\User;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {

    $users = User::all()->pluck('id')->toArray();

    return [
        "age" =>$faker->randomDigit,
        "linkedin_url" =>$faker->url,
        "education" =>"University of " . $faker->city,
        "image_url" =>$faker->imageUrl($width = 100, $height = 100),
        "title" =>$faker->title,
        "bio" =>$faker->realText($maxNbChars = 100, $indexSize = 2),
        "user_id" =>$faker->unique()->randomElement($users)
    ];
});
