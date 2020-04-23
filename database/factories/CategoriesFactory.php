<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Categories;
use Faker\Generator as Faker;

$factory->define(Categories::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' =>$faker->text,
        'img_src' => $faker->randomElement([
            'food_menu/single_food_4.png',
            'food_menu/single_food_2.png'

        ]),
        'start_time' => $faker->dateTime()->format('Y-m-d H:i:s'),
        'end_time' => $faker->dateTime()->format('Y-m-d H:i:s')
    ];
});

$factory->define(\App\Models\FoodItem::class, function (Faker $faker) {
   return [
       'name' => $faker->name,
       'description' =>$faker->text,
       'img_src' => $faker->randomElement([
           'food_menu/single_food_1.png',
           'food_menu/single_food_2.png',
           'food_menu/single_food_3.png',
           'food_menu/single_food_4.png',
       ]),
       'price'  => $faker->randomFloat(2,10, 45),
       'is_active' =>$faker->boolean(100)
   ];
});
