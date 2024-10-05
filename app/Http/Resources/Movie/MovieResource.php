<?php

namespace App\Http\Resources\Movie;

use App\Http\Resources\JsonResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\Movie
 */
class MovieResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getKey(),
            'title' => $this->title,
            'description' => $this->description,
            'ageRating' => $this->age_rating,
            'language' => $this->language,
            'coverImage' => $this->when(
                $this->cover_path !== null,
                fn () => 'TODO: Has cover image',
                fn () => 'TODO: Cover image is missing'
            ),
            'createdAt' => $this->created_at->toAtomString(),
            'updatedAt' => $this->updated_at->toAtomString(),
        ];
    }
}
