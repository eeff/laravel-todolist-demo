<?php

use Faker\Generator as Faker;

$factory->define(App\Todo::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body'  => $faker->text,
        'due'   => "{$faker->dayOfWeek}, {$faker->dayOfMonth} {$faker->monthName}",
    ];
});
