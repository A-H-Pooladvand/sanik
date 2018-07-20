<?php

use App\Category;
use App\News;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) use ($factory) {

    $classes = [
        News::class,
    ];

    return [
        'category_type' => $classes[rand(0, (count($classes) - 1))],
        'title' => $faker->realText(50),
        'slug' => $faker->slug(1),
    ];
});
