<?php

use Faker\Generator as Faker;

$factory->define(\App\Food::class, function (Faker $faker) {
    return [
        'foodName'=>$faker->lastName,
        'foodType'=>$faker->randomElement(['Breakfast', 'Lunch' ,'Dinner']),
        'description'=>$faker->text(150,2),
        'price'=>$faker->numberBetween(10,250),
    ];
});
