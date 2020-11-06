<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Channel;
use App\Models\Thread;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Thread::class, function (Faker $faker) {
    $title = $faker->sentence;

    return [
        'user_id' => User::count() ? User::pluck('id')->random() : factory(User::class),
        'channel_id' => factory(Channel::class),
        'title' => $title,
        'body' => $faker->paragraph,
        'visits' => 0,
        'locked' => false
    ];
});
