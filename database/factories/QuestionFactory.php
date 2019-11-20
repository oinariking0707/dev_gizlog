<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Question::class, function (Faker $faker) {
    return [
        'user_id'         =>  $faker->numberBetween(1, 4),
        'tag_category_id' =>  $faker->numberBetween(1, 4),
        'title'           =>  $faker->word,
        'comment'         =>  $faker->realText(300),
        'created_at'      =>  $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
