<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgendaRequest;
use App\Http\Requests\UpdateAgendaRequest;
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

    public function show(Agenda $agenda): AgendaResource
    {
        $agenda->load('movie');

        return AgendaResource::make($agenda);
    }

    public function update(UpdateAgendaRequest $request, Agenda $agenda): AgendaResource
    {
        $agenda->update([
            'seats' => $request->seats,
            'start_date' => $request->startDate,
            'movie_id' => $request->movie,
        ]);

        $agenda = $agenda->fresh('movie');

        return AgendaResource::make($agenda);
    }
}
