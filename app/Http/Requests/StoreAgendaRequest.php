<?php

namespace App\Http\Requests;

use App\Models\Movie;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property-read string $movie
 * @property-read int $seats
 * @property-read string $startDate
 */
class StoreAgendaRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'movie' => ['required', Rule::exists(Movie::class, 'id')],
            'seats' => ['required', 'int', 'min:1', 'max:32766'],
            'startDate' => ['required', 'date_format:Y-m-d H:i:s'],
        ];
    }
}
