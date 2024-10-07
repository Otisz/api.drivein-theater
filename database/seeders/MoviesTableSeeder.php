<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::firstOrCreate([
            'title' => 'The Matrix',
            'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
            'age_rating' => 16,
            'language' => 'English',
        ]);

        Movie::firstOrCreate([
            'title' => 'The Dark Knight',
            'description' => 'When Gotham City is engulfed in a bloody war between the Joker and the Thinker, Batman must join forces with the world\'s greatest heroes to restore Gotham and bring the day of justice to the city.',
            'age_rating' => 18,
            'language' => 'English',
        ]);

        Movie::firstOrCreate([
            'title' => 'The Dark Knight Rises',
            'description' => 'Gotham City is engulfed in a bloody war between the Joker and the Thinker, Batman must join forces with the world\'s greatest heroes to restore Gotham and bring the day of justice to the city.',
            'age_rating' => 18,
            'language' => 'English',
        ]);

        Movie::firstOrCreate([
            'title' => 'Inception',
            'description' => 'A thief who steals corporate secrets through use of dream-sharing technology is given the inverse task of planting an idea into the mind of a CEO.',
            'age_rating' => 18,
            'language' => 'English',
        ]);

        Movie::firstOrCreate([
            'title' => 'Interstellar',
            'description' => 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival and to discover a new planet to call home.',
            'age_rating' => 12,
            'language' => 'English',
        ]);
    }
}
