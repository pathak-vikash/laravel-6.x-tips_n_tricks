<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text(50),
        'description' => $faker->text(500),
        'user_id' => factory(App\User::class)
    ];
});
