<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user1= factory(\Laratube\User::class)->create([
            'email' => 'john@doe.com'
        ]);

        $user2= factory(\Laratube\User::class)->create([
            'email' => 'jane@doe.com'
        ]);

        $channel1 = factory(\Laratube\Channel::class)->create([
            'user_id' => $user1->id
        ]);

        $channel2 = factory(\Laratube\Channel::class)->create([
            'user_id' => $user2->id
        ]);

        $channel1->subscriptions()->create([
            'user_id' => $user2->id
        ]);

        $channel2->subscriptions()->create([
            'user_id' => $user1->id
        ]);

        factory(\Laratube\Subscription::class, 100)->create([
            'channel_id' => $channel1->id
        ]);

        factory(\Laratube\Subscription::class, 100)->create([
            'channel_id' => $channel2->id
        ]);

    }
}
