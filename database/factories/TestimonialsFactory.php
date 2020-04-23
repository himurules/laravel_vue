<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Testimonials::class, function (Faker $faker) {
    return [
        'testimonial' => $faker->text(200),
        'is_active' => $faker->boolean(100),
    ];
});
