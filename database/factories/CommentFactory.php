<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    return [
        'user_id'         =>  $faker->numberBetween(1, 4),
        'question_id'     =>  $faker->numberBetween(1, 50),
        'comment'         =>  $faker->realText(20),
        'created_at'      =>  $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
