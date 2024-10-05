<?php

namespace App\Http\Requests;

use App\Enums\AgeRating;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property-read string $title
 * @property-read string $description
 * @property-read int $ageRating
 * @property-read string $language
 */
class StoreMovieRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', ' string', 'max:255'],
            'description' => ['required', 'string'],
            'ageRating' => ['required', 'int', Rule::enum(AgeRating::class)],
            'language' => ['required', 'string'],
        ];
    }
}
