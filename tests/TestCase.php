<?php

namespace Tests;

use Tests\CreatesApplication;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Models\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    //public function setUp(): void
    //{
        //parent::setUp();

        //DB::statement('PRAGMA foreign_keys=on;');

        //$this->disableExceptionHandling();
    //}

    protected function signIn($user = null)
    {
        $user = $user ?: create(User::class);

        $this->actingAs($user);

        return $this;
    }

    // Hat tip, @adamwathan.
    //protected function disableExceptionHandling()
    //{
        //$this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);

        //$this->app->instance(ExceptionHandler::class, new class extends Handler {
           // public function __construct() {}
            //public function report(\Exception $e) {}
            //public function render($request, \Exception $e) {
               // throw $e;
            //}
        //});
   // }

    //protected function withExceptionHandling()
    //{
        //$this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);

        //return $this;
    //}
}
