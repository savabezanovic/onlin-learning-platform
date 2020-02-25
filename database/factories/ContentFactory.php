<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Content;
use App\Course;
use Faker\Generator as Faker;

$factory->define(Content::class, function (Faker $faker) {

    $course = Course::all()->pluck('id')->toArray();

    return [
        "desc" => $faker->realText($maxNbChars = 100, $indexSize = 2),
        "course_id" => $faker->randomElement($course)
    ];
});
