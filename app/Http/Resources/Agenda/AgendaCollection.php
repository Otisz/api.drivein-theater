<?php

namespace App\Http\Resources\Agenda;

use App\Http\Resources\ResourceCollection;

class AgendaCollection extends ResourceCollection
{
    public $collects = AgendaResource::class;
}
