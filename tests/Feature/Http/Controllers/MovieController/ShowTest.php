<?php

namespace Tests\Feature\Http\Controllers\MovieController;

use App\Models\Movie;
use Tests\TestCase;

class ShowTest extends TestCase
{
    public function testItShowsTheMovie(): void
    {
        $movie = Movie::factory()->create();

        $this->getJson(route('movies.show', $movie))
            ->assertOk()
            ->assertJsonFragment([
                'title' => $movie->title,
                'description' => $movie->description,
                'ageRating' => $movie->age_rating,
                'language' => $movie->language,
            ]);
    }
}
