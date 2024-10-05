<?php

namespace Tests\Feature\Http\Controllers\MovieController;

use App\Models\Movie;
use Illuminate\Support\Str;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    public function testItRequiresAuthentication(): void
    {
        $this->deleteJson(route('movies.destroy', Str::uuid7()->toString()))
            ->assertUnauthorized();
    }

    public function testItDeletesTheMovie(): void
    {
        $this->login();

        $movie = Movie::factory()->create();

        $this->deleteJson(route('movies.destroy', $movie))
            ->assertNoContent();

        $this->assertSoftDeleted($movie);
    }
}
