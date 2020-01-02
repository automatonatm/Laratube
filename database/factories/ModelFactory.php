<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Laratube\Model;
use Faker\Generator as Faker;
use Laratube\User;

$factory->define(\Laratube\Channel::class, function (Faker $faker) {

    return [

       'user_id' => function() {
           factory(\Laratube\User::class)->create()->id;
       },
        'name' => $faker->sentence(3),
        'description' => $faker->paragraph(3)
    ];
});



$factory->define(\Laratube\Subscription::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(\Laratube\User::class)->create()->id;
        },

        'channel_id' => function() {
            return factory(\Laratube\Channel::class)->create()->id;
        },

    ];
});
