<?php

use App\User;
use App\ScopeOfWork;
use Faker\Generator as Faker;

$factory->define(ScopeOfWork::class, function (Faker $faker) use ($factory) {

    return [
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
        'status' => 'publish',
        'title' => $title = $faker->realText(40),
        'link' => str_slug($title),
        'summary' => $faker->realText(400),
        'image' => 'files/_test/' . rand(1, 10) . '.jpg',
        'priority' => rand(1, 255),
        'body' => $faker->realText(rand(1, 5) * 500),
    ];
});
