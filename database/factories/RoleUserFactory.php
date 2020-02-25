<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RoleUser;
use App\User;
use App\Role;
use Faker\Generator as Faker;

$factory->define(RoleUser::class, function (Faker $faker) {

    $users = User::all()->pluck('id')->toArray();
    $roles = Role::all()->pluck('id')->toArray();

    return [
        
        "user_id" => $faker->randomElement($users),
        "role_id" => $faker->randomElement($roles)

    ];
});
