<?php

namespace App\Http\Resources\Agenda;

use App\Http\Resources\JsonResource;
use App\Http\Resources\Movie\MovieResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\Agenda
 */
class AgendaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getKey(),
            'seats' => $this->seats,
            'startDate' => $this->start_date->toAtomString(),
            'movie' => $this->whenLoaded('movie', fn () => MovieResource::make($this->movie)),
            'createdAt' => $this->created_at->toAtomString(),
            'updatedAt' => $this->updated_at->toAtomString(),
        ];
    }
}
