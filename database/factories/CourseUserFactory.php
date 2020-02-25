<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CourseUser;
use App\User;
use App\Course;
use Faker\Generator as Faker;

$factory->define(CourseUser::class, function (Faker $faker) {

    $users = User::all()->pluck('id')->toArray();
    $course = Course::all()->pluck('id')->toArray();

    return [
        
        "user_id" => $faker->randomElement($users),
        "course_id" => $faker->randomElement($course)

    ];
});
