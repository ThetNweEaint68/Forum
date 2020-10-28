<?php

namespace Database\Factories;

use App\Models\Thread;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThreadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Thread::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return factory('App\Models\User')->create()->id;
            },
            'channel_id' => function () {
                return factory('App\Models\Channel')->create()->id;
            },
            'title' => $title,
            'body' => $faker->paragraph,
            'visits' => 0,
            'slug' => str_slug($title),
            'locked' => false
        ];
    }
}
