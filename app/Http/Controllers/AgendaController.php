<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgendaRequest;
use App\Http\Resources\Agenda\AgendaResource;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public function store(StoreAgendaRequest $request): AgendaResource
    {
        $agenda = Agenda::create([
            'movie_id' => $request->movie,
            'seats' => $request->seats,
            'start_date' => $request->startDate,
        ]);

        $agenda->load('movie');

        return AgendaResource::make($agenda);
    }
}
