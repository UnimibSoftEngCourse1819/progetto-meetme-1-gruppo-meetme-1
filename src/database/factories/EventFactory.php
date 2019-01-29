<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->realText,
        'public' => $faker->boolean,
        'from' => ($faker->boolean) ? $faker->dateTimeBetween('-1 year', '-6 months') : null,
        'to' => ($faker->boolean) ? $faker->dateTimeBetween('-6 months') : null,
        'ended_at' => ($faker->boolean) ? $faker->dateTime() : null
    ];
});
