<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Chefs::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'title' => $faker->randomElement(['Chef Master', 'Chef Assistant', 'Chef Grand Master']),
        'fb_link'   => 'http://facebook.com/profile/'.$faker->randomLetter,
        'twitter_link'   => 'http://twitter.com/profile/'.$faker->randomLetter,
        'insta_link'   => 'http://instagram.com/profile/'.$faker->randomLetter,
        'skype_link'   => 'http://reddit.com/profile/'.$faker->randomLetter,
        'img_src'      => $faker->randomElement(['img/team/chefs_1.png','img/team/chefs_2.png','img/team/chefs_3.png'])
    ];
});
