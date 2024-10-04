<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Passport\Passport;

abstract class TestCase extends BaseTestCase
{
    use LazilyRefreshDatabase;

    public function login(array $attributes = []): User
    {
        $user = User::factory()->create($attributes);

        Passport::actingAs($user);

        return $user;
    }
}
