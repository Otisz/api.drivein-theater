<?php

namespace Tests\Feature\Models;

use App\Models\Agenda;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class MovieTest extends TestCase
{
    #[DataProvider('attributeDataProvider')]
    public function testItHasAttributes(string $attribute): void
    {
        $movie = Movie::factory()->create();

        $this->assertDatabaseHas($movie, [
            $attribute => $movie->{$attribute},
        ]);
    }

    public function testItHasManyAgenda(): void
    {
        $movie = Movie::factory()->create();

        Agenda::factory()->count(3)->for($movie)->create();

        $this->assertCount(3, $movie->agendas);
        $this->assertInstanceOf(Collection::class, $movie->agendas);
        $this->assertInstanceOf(Agenda::class, $movie->agendas->first());
    }

    public function testItHasPlaceholderCoverImage(): void
    {
        $movie = Movie::factory()->create();

        $this->assertNull($movie->cover_path);
        $this->assertStringContainsString('covers/placeholder.png', $movie->cover_url);
    }

    public function testItHasCoverImage(): void
    {
        $movie = Movie::factory()->create([
            'cover_path' => 'covers/test.jpg',
        ]);

        $this->assertStringContainsString('covers/test.jpg', $movie->cover_url);
    }

    public static function attributeDataProvider(): array
    {
        return [
            ['title'],
            ['description'],
            ['age_rating'],
            ['language'],
        ];
    }
}
