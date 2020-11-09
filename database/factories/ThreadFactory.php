<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Channel;
use App\Models\Thread;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Thread::class, function (Faker $faker) {
    $title = $faker->sentence;

    return [
        'user_id' => User::count() ? User::pluck('id')->random() : factory(User::class)->create()->id,
        'channel_id' => factory(Channel::class)->create()->id,
        'title' => $title,
        'slug' => Str::slug($title),
        'body' => $faker->paragraph,
        'visits' => 0,
        'locked' => false
    ];
});
