<?php

namespace Database\Factories;

use App\Enums\AgeRating;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph,
            'age_rating' => $this->faker->randomElement(AgeRating::values()),
            'language' => $this->faker->languageCode,
        ];
    }

    public function withCover(): static
    {
        return $this->state(fn (array $attributes) => [
            'cover_path' => $this->faker->filePath(),
        ]);
    }
}
