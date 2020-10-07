<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'confirmed' => true
    ];
});

$factory->state(App\Models\User::class, 'unconfirmed', function () {
    return [
        'confirmed' => false
    ];
});

$factory->state(App\Models\User::class, 'administrator', function () {
    return [
        'name' => 'JohnDoe'
    ];
});

$factory->define(App\Models\Thread::class, function ($faker){
        $title = $faker->sentence;

        return [
            'user_id' => function () {
                return factory('App\Models\User')->create()->id;
            },
            'channel_id' => function () {
                return factory('App\Models\Channel')->create()->id;
            },
            'title' => $title,
            'body'  => $faker->paragraph,
            'visits' => 0,
            'slug' => $title,
            'locked' => false
        ];
});

$factory->define(App\Models\Channel::class, function ($faker) {
    $name = $faker->word;

    return [
        'name' => $name,
        'slug' => $name
    ];
});


$factory->define(App\Models\Reply::class, function ($faker) {
    return [
        'thread_id' => function () {
            return factory('App\Models\Thread')->create()->id;
        },
        'user_id' => function () {
            return factory('App\Models\User')->create()->id;
        },
        'body'  => $faker->paragraph
    ];
});

$factory->define(\Illuminate\Notifications\DatabaseNotification::class, function ($faker) {
    return [
        'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
        'type' => 'App\Notifications\ThreadWasUpdated',
        'notifiable_id' => function () {
            return auth()->id() ?: factory('App\Models\User')->create()->id;
        },
        'notifiable_type' => 'App\User',
        'data' => ['foo' => 'bar']
    ];
});