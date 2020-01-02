<?php

namespace Laratube\Policies;

use Laratube\User;
use Laratube\Subscription;
use Illuminate\Auth\Access\HandlesAuthorization;

class TempPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any subscriptions.
     *
     * @param  \Laratube\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the subscription.
     *
     * @param  \Laratube\User  $user
     * @param  \Laratube\Subscription  $subscription
     * @return mixed
     */
    public function view(User $user, Subscription $subscription)
    {
        //
    }

    /**
     * Determine whether the user can create subscriptions.
     *
     * @param  \Laratube\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the subscription.
     *
     * @param  \Laratube\User  $user
     * @param  \Laratube\Subscription  $subscription
     * @return mixed
     */
    public function update(User $user, Subscription $subscription)
    {
        //
    }

    /**
     * Determine whether the user can delete the subscription.
     *
     * @param  \Laratube\User  $user
     * @param  \Laratube\Subscription  $subscription
     * @return mixed
     */
    public function delete(User $user, Subscription $subscription)
    {
        //
    }

    /**
     * Determine whether the user can restore the subscription.
     *
     * @param  \Laratube\User  $user
     * @param  \Laratube\Subscription  $subscription
     * @return mixed
     */
    public function restore(User $user, Subscription $subscription)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the subscription.
     *
     * @param  \Laratube\User  $user
     * @param  \Laratube\Subscription  $subscription
     * @return mixed
     */
    public function forceDelete(User $user, Subscription $subscription)
    {
        //
    }
}
