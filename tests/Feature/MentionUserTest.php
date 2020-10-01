<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MentionUserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function mentioned_users_in_a_reply_are_notified()
    {
        // Given we have a user, JohnDoe, who is signed in.
        $john = create('App\Models\User', ['name' => 'JohnDoe']);

        $this->signIn($john);

        // And we also have a user, Thet.
        $jane = create('App\Models\User', ['name' => 'Thet']);

        // If we have a thread
        $thread = create('App\Models\Thread');

        // And JohnDoe replies to that thread and mentions @Thet.
        $reply = make('App\Models\Reply', [
            'body' => 'Hey @Thet check this out.'
        ]);

        $this->json('post', $thread->path() . '/replies', $reply->toArray());

        // Then @Thet should receive a notification.
        $this->assertCount(1, $jane->notifications);
    }
}
