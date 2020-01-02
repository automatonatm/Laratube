<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laratube\Channel;
use Laratube\Subscription;
use Laratube\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubscriptionTest extends TestCase
{
    use DatabaseMigrations;

    public function test_an_auth_user_can_subscribe_to_a_channel()
    {
        $this->withoutExceptionHandling();
         $this->logedIn();
         $user =  create(User::class);
         $channel = factory(Channel::class)->create(['user_id' => $user->id]);
        $this->assertCount(0, $channel->fresh()->subscriptions);

         $this->postJson('/channels/'.$channel->id.'/subscriptions');

         $this->assertCount(1, $channel->fresh()->subscriptions);

    }

    public function test_an_unauth_user_cannot_subscribe_to_a_channel()
    {
        //$this->withoutExceptionHandling();

        $channel = create(Channel::class, ['user_id' => create(User::class)->id]);

        $this->postJson('/channels/'.$channel->id.'/subscriptions')->assertStatus(401);

    }

    public function test_a_user_cannot_subscribe_to_his_own_channel()
    {
        $this->logedIn();

        $channel = create(Channel::class, ['user_id' => auth()->id()]);

        //create(Subscription::class, ['user_id'])

        $this->postJson('/channels/'.$channel->id.'/subscriptions')->assertStatus(403);


    }


}
