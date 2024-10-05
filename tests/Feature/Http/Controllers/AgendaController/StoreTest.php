<?php

namespace Tests\Feature\Http\Controllers\AgendaController;

use App\Models\Agenda;
use App\Models\Movie;
use Tests\TestCase;

class StoreTest extends TestCase
{
    public function testItRequiresAuthentication(): void
    {
        $this->postJson(route('agenda.store'))
            ->assertUnauthorized();
    }

    public function testItRequiresData(): void
    {
        $this->login();

        $this->postJson(route('agenda.store'))
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'seats',
                'startDate',
                'movie',
            ]);
    }

    public function testItStoresTheAgenda(): void
    {
        $this->login();

        $movie = Movie::factory()->create();
        $agendaData = Agenda::factory()->make();

        $this->postJson(route('agenda.store'), [
            'movie' => $movie->getKey(),
            'seats' => $agendaData->seats,
            'startDate' => $agendaData->start_date->toDateTimeString(),
        ])
            ->assertCreated()
            ->assertJsonFragment([
                'seats' => $agendaData->seats,
                'startDate' => $agendaData->start_date->toAtomString(),
            ])
            ->assertJsonFragment([
                'title' => $movie->title,
                'description' => $movie->description,
                'ageRating' => $movie->age_rating,
                'language' => $movie->language,
            ]);

        $this->assertDatabaseHas(Agenda::class, [
            'movie_id' => $movie->getKey(),
            'seats' => $agendaData->seats,
            'start_date' => $agendaData->start_date,
        ]);
    }
}
