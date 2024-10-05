<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasVersion7Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agenda extends Model
{
    /** @use HasFactory<\Database\Factories\AgendaFactory> */
    use HasFactory;

    use HasVersion7Uuids;
    use SoftDeletes;

    protected $casts = [
        'start_date' => 'datetime',
    ];

    // region Relationships

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    // endregion Relationships
}
