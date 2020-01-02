<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laratube\Channel;
use Laratube\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChannelTest extends TestCase
{
   use DatabaseMigrations;

    public function test_a_user_can_view_a_channel()
    {

        $user = factory(User::class)->create();

        $channel = factory(Channel::class)->create(['name' => $user->name, 'user_id' => $user->id]);

       // dd($channel->toArray());

        $this->get(route('channels.show', $channel->id))
            ->assertSee($channel->name)
        ->assertSee($channel->description);
   }



    public function test_only_authorised_user_can_update_a_channel()
    {

        $this->withoutExceptionHandling();
        $this->logedIn();
        $channel = factory(Channel::class)->create(['user_id' => auth()->id()]);

        $this->assertDatabaseHas('channels', ['name' => $channel->name, 'description' => $channel->description]);

        $this->patch(route('channels.update', $channel->id ), [
            'name' => 'John Doe',
            'description' => 'My Updated Channel'
        ])->assertStatus(302);

       // dd($channel->toArray());

        $this->assertDatabaseHas('channels', ['description' => 'My Updated Channel']);

   }



    public function test_login_to_update_a_channel()
    {
        //$this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $channel = factory(Channel::class)->create(['user_id' => $user->id]);
        $this->patch(route('channels.update', $channel->id ))
            ->assertRedirect('/login');

    }

    public function test_unauthorised_users_cannot_update_a_channel()
    {



        $this->logedIn();
        $channel = create(Channel::class, ['user_id' => auth()->id()]);
        $this->patch(route('channels.update', $channel->id ))
            ->assertStatus(302);

    }

    public function test_an_update_request_must_have_correct_data()
    {
        $this->logedIn();

        $channel = factory(Channel::class)->create(['user_id' => auth()->id()]);

        $this->assertDatabaseHas('channels', ['user_id'=> auth()->id(), 'name' => $channel->name, 'description' => $channel->description]);

        $this->patch(route('channels.update', $channel->id ), [
            'name' => null,
            'description' => 'ncnnclln'
        ])->assertSessionHasErrors('name')
        ->assertSessionHasErrors('description');


    }









}
