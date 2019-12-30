<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Laratube\Model;
use Faker\Generator as Faker;

$factory->define(\Laratube\Channel::class, function (Faker $faker) {
    $user = factory(\Laratube\User::class)->create();
    return [
       'user_id' => $user->id,
        'name' => $user->name,
        'description' => $faker->paragraph(3)
    ];
});
