<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {

    $category = Category::all()->pluck('id')->toArray();

    return [
        "name" => $faker->name,
        "desc" => $faker->realText($maxNbChars = 100, $indexSize = 2),
        "goals" => $faker->realText($maxNbChars = 10),
        "category_id" => $faker->randomElement($category),
        "video_url" => $faker->url
    ];
});
