<?php

use Faker\Generator as Faker;

$factory->define(App\TimeSlot::class, function (Faker $faker) {
    return [
        'from' => $faker->dateTimeThisDecade,
        'to' => $faker->dateTimeThisDecade
   ];
});
