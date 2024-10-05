<?php

namespace Tests\Feature\Http\Controllers\AgendaController;

use App\Models\Agenda;
use Tests\TestCase;

class ShowTest extends TestCase
{
    public function testItShowsTheAgenda(): void
    {
        $agenda = Agenda::factory()->create();

        $this->getJson(route('agenda.show', $agenda))
            ->assertOk()
            ->assertJsonFragment([
                'id' => $agenda->getKey(),
                'seats' => $agenda->seats,
                'startDate' => $agenda->start_date->toAtomString(),
            ])
            ->assertJsonFragment([
                'title' => $agenda->movie->title,
                'description' => $agenda->movie->description,
                'ageRating' => $agenda->movie->age_rating,
                'language' => $agenda->movie->language,
            ]);
    }
}
