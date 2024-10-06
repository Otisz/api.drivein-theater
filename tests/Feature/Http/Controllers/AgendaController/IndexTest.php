<?php

namespace Tests\Feature\Http\Controllers\AgendaController;

use App\Models\Agenda;
use Tests\TestCase;

class IndexTest extends TestCase
{
    public function testItShowsTheAgenda(): void
    {
        Agenda::factory()->count(5)->create();
        $agenda = Agenda::factory()->create([
            'start_date' => now(),
        ]);
        Agenda::factory()->count(5)->create();

        $this->getJson(route('agenda.index'))
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
