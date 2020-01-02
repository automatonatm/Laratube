<?php

namespace Laratube\Http\Controllers;

use Illuminate\Http\Request;
use Laratube\Channel;
use Laratube\Subscription;

class SubscriptionController extends Controller
{
    /**
     * SubscriptionController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @param Channel $channel
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(Channel $channel)
    {
        $this->authorize('update', $channel);

      return   $channel->subscriptions()->create([
            'user_id' => auth()->id(),
            'channel_id' => $channel->id
        ]);

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel, Subscription $subscription)
    {

        $subscription->delete();

        return response([]);

    }
}
