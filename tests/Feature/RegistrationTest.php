<?php

namespace Tests\Feature;

use App\Mail\PleaseConfirmYourEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function a_confirmation_email_is_sent_upon_registration()
    {
        Mail::fake();

        $this->post(route('register'), [
            'name' => 'Thet',
            'email' => 'thet@gmail.com',
            'password' => '11111111',
            'password_confirmation' => '11111111'
        ]);

        Mail::assertQueued(PleaseConfirmYourEmail::class);
    }
}
