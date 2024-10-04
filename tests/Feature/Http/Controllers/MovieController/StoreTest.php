<?php

namespace Tests\Feature\Http\Controllers\MovieController;

use App\Models\Movie;
use Tests\TestCase;

class StoreTest extends TestCase
{
    public function testItRequiresAuthentication(): void
    {
        $this->postJson(route('movies.store'))
            ->assertUnauthorized();
    }

    public function testItRequiresData(): void
    {
        $this->login();

        $this->postJson(route('movies.store'))
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'title',
                'description',
                'ageRating',
                'language',
            ]);
    }

    public function testItStoresTheMovie(): void
    {
        $this->login();

        $movieData = Movie::factory()->make();

        $this->postJson(route('movies.store'), [
            'title' => $movieData->title,
            'description' => $movieData->description,
            'ageRating' => $movieData->age_rating,
            'language' => $movieData->language,
        ])
            ->assertCreated()
            ->assertJsonFragment([
                'title' => $movieData->title,
                'description' => $movieData->description,
                'ageRating' => $movieData->age_rating,
                'language' => $movieData->language,
            ]);

        $this->assertDatabaseHas(Movie::class, [
            'title' => $movieData->title,
            'description' => $movieData->description,
            'age_rating' => $movieData->age_rating,
            'language' => $movieData->language,
        ]);
    }
}
