<?php

namespace Tests\Feature\Http\Controllers\MovieCoverController;

use App\Models\Movie;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tests\TestCase;

class UploadTest extends TestCase
{
    public function testItRequiresAuthentication(): void
    {
        $this->putJson(route('movies.cover', Str::uuid7()->toString()))
            ->assertUnauthorized();
    }

    public function testItRequiresData(): void
    {
        $this->login();

        $movie = Movie::factory()->create();

        $this->putJson(route('movies.cover', $movie))
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'cover',
            ]);
    }

    public function testItUploadsTheCoverImage(): void
    {
        $this->login();

        Storage::fake('public');

        $movie = Movie::factory()->create();

        $file = UploadedFile::fake()->image('cover.jpg');

        $this->putJson(route('movies.cover', $movie), [
            'cover' => $file,
        ]);

        Storage::disk('public')->assertExists("/covers/{$movie->getKey()}.{$file->extension()}");

        $this->assertDatabaseHas($movie, [
            'id' => $movie->getKey(),
            'cover_path' => "covers/{$movie->getKey()}.{$file->extension()}",
        ]);
    }
}
