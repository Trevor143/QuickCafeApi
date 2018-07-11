<?php

use Faker\Generator as Faker;

$factory->define(\App\Order::class, function (Faker $faker) {
    return [
        //
        'foodName'=> $faker->lastName,
        'user_id'=>$faker->numberBetween(1,10),
        'quantity'=>$faker->numberBetween(2,50),
    ];
});
