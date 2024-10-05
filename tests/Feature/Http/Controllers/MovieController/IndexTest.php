<?php

namespace Tests\Feature\Http\Controllers\MovieController;

use App\Models\Movie;
use Tests\TestCase;

class IndexTest extends TestCase
{
    public function testItListsTheMovies(): void
    {
        Movie::factory()->count(5)->create();
        $movie = Movie::factory()->create();
        Movie::factory()->count(5)->create();

        $this->getJson(route('movies.index'))
            ->assertOk()
            ->assertJsonFragment([
                'title' => $movie->title,
                'description' => $movie->description,
                'ageRating' => $movie->age_rating,
                'language' => $movie->language,
            ]);
    }
}
