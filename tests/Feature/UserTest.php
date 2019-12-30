<?php

namespace Tests\Feature;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laratube\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function test_a_channel_is_created_when_a_user_signs_up()
    {
        // a user register
        $this->post('/register', [
            'name' => 'Automaton',
            'email' => 'mail@example.com',
            'password' => 'foobar',
            'password_confirmation' => 'foobar',
        ]);

        event(new Registered(create(User::class)));

        $channel= User::first()->channel;

       // dd($channel);

        $this->assertDatabaseHas('channels', $channel->toArray());

        //an event is fired
        //a channel for the user exist
    }
}
