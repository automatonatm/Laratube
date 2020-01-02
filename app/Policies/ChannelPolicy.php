<?php

namespace Laratube\Policies;

use Laratube\User;
use Laratube\Channel;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChannelPolicy
{
    use HandlesAuthorization;
    

    /**
     * Determine whether the user can update the channel.
     *
     * @param  \Laratube\User  $user
     * @param  \Laratube\Channel  $channel
     * @return mixed
     */
    public function update(User $user, Channel $channel)
    {

        return $channel->user_id != $user->id;

    }



}
