<?php

namespace App\Http\Resources\Profile;

use App\Http\Resources\JsonResource;

/**
 * @mixin \App\Models\User
 */
class ProfileResource extends JsonResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->getKey(),
            'name' => $this->name,
            'email' => $this->email,
            'createdAt' => $this->created_at?->toAtomString(),
            'updatedAt' => $this->updated_at?->toAtomString(),
        ];
    }
}
