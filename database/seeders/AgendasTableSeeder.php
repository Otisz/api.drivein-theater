<?php

namespace Database\Seeders;

use App\Models\Agenda;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class AgendasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movie = Movie::firstOrCreate([
            'title' => 'Back to the Future',
            'description' => 'A young man is sent back in time in order to save his family from the impending destruction of civilization.',
            'age_rating' => 6,
            'language' => 'English',
        ]);

        Agenda::firstOrCreate([
            'movie_id' => $movie->getKey(),
            'seats' => 2,
            'start_date' => '2024-11-07 18:00:00',
        ]);

        $movie = Movie::firstOrCreate([
            'title' => 'The Truman Show',
            'description' => 'A man is sent back in time in order to save his family from the impending destruction of civilization.',
            'age_rating' => 12,
            'language' => 'English',
        ]);

        Agenda::firstOrCreate([
            'movie_id' => $movie->getKey(),
            'seats' => 2,
            'start_date' => '2024-11-08 18:00:00',
        ]);
    }
}
