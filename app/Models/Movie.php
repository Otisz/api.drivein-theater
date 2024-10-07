<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasVersion7Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Movie extends Model
{
    /** @use HasFactory<\Database\Factories\MovieFactory> */
    use HasFactory;
    use HasVersion7Uuids;
    use SoftDeletes;

    // region Relationships

    public function agendas(): HasMany
    {
        return $this->hasMany(Agenda::class);
    }

    // endregion Relationships

    // region Casts

    protected function coverUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->cover_path ? Storage::url($this->cover_path) : Storage::url('covers/placeholder.png'),
        );
    }

    // endregion Casts
}
