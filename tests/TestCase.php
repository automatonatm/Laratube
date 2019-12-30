<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function logedIn($user = null)
    {
        $user = $user ?: create(\Laratube\User::class);
        $this->actingAs($user);
        return $this;
    }
}
