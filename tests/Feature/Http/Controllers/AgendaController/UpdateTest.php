<?php

namespace Tests\Feature\Http\Controllers\AgendaController;

use App\Models\Agenda;
use App\Models\Movie;
use Illuminate\Support\Str;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    public function testItRequiresAuthentication(): void
    {
        $this->putJson(route('agenda.update', Str::uuid7()->toString()))
            ->assertUnauthorized();
    }

    public function testItRequiresData(): void
    {
        $this->login();

        $agenda = Agenda::factory()->create();

        $this->putJson(route('agenda.update', $agenda))
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

        $agenda = Agenda::factory()->create();
        $movie = Movie::factory()->create();
        $agendaData = Agenda::factory()->make();

        $this->putJson(route('agenda.update', $agenda), [
            'movie' => $movie->getKey(),
            'seats' => $agendaData->seats,
            'startDate' => $agendaData->start_date->toDateTimeString(),
        ])
            ->assertOk()
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
            'id' => $agenda->getKey(),
            'movie_id' => $movie->getKey(),
            'seats' => $agendaData->seats,
            'start_date' => $agendaData->start_date,
        ]);
    }
}
