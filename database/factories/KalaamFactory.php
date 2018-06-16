<?php

use App\News;
use App\Project;
use App\Slider;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) use ($factory) {

    return [
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
        'title' => $faker->realText(50),
        'image' => 'files/_test/' . rand(1, 10) . '.jpg',
        'description' => $faker->realText(500),
        'link' => $faker->url,
    ];
});

$factory->define(News::class, function (Faker $faker) use ($factory) {

    return [
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
//        'status' => $faker->randomElement(['publish', 'draft']),
        'status' => 'publish',
        'title' => $faker->realText(40),
        'summary' => $faker->realText(500),
        'image' => 'files/_test/' . rand(1, 10) . '.jpg',
        'content' => $faker->realText(rand(1, 5) * 1000),
        'publish_at' => Carbon::now()->addHour(rand(0, 10)),
        'expire_at' => Carbon::now()->addWeek(rand(5, 10)),
    ];
});

$factory->define(Project::class, function (Faker $faker) use ($factory) {

    return [
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
//        'status' => $faker->randomElement(['publish', 'draft']),
        'status' => 'publish',
        'title' => $faker->realText(40),
        'summary' => $faker->realText(500),
        'image' => 'files/_test/' . rand(1, 10) . '.jpg',
        'content' => $faker->realText(rand(1, 5) * 1000),
        'publish_at' => Carbon::now()->addHour(rand(0, 10)),
        'expire_at' => Carbon::now()->addWeek(rand(5, 10)),
    ];
});
