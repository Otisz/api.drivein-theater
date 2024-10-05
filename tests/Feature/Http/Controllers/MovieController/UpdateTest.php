<?php

namespace Tests\Feature\Http\Controllers\MovieController;

use App\Models\Movie;
use Illuminate\Support\Str;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    public function testItRequiresAuthentication(): void
    {
        $this->putJson(route('movies.update', Str::uuid7()->toString()))
            ->assertUnauthorized();
    }

    public function testItRequiresData(): void
    {
        $this->login();

        $movie = Movie::factory()->create();

        $this->putJson(route('movies.update', $movie))
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'title',
                'description',
                'ageRating',
                'language',
            ]);
    }

    public function testItUpdatesTheMovie(): void
    {
        $this->login();

        $movie = Movie::factory()->create();
        $movieData = Movie::factory()->make();

        $this->putJson(route('movies.update', $movie), [
            'title' => $movieData->title,
            'description' => $movieData->description,
            'ageRating' => $movieData->age_rating,
            'language' => $movieData->language,
        ])
            ->assertOk()
            ->assertJsonFragment([
                'title' => $movieData->title,
                'description' => $movieData->description,
                'ageRating' => $movieData->age_rating,
                'language' => $movieData->language,
            ]);

        $this->assertDatabaseHas(Movie::class, [
            'id' => $movie->getKey(),
            'title' => $movieData->title,
            'description' => $movieData->description,
            'age_rating' => $movieData->age_rating,
            'language' => $movieData->language,
        ]);
    }
}
