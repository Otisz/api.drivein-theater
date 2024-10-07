<?php

namespace Tests\Feature\Models;

use App\Models\Agenda;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class AgendaTest extends TestCase
{
    #[DataProvider('attributeDataProvider')]
    public function testItHasAttributes(string $attribute): void
    {
        $agenda = Agenda::factory()->create();

        $this->assertDatabaseHas($agenda, [
            $attribute => $agenda->{$attribute},
        ]);
    }

    public function testItBelongsToAMovie(): void
    {
        $agenda = Agenda::factory()->create();

        $this->assertInstanceOf(BelongsTo::class, $agenda->movie());
        $this->assertInstanceOf(Movie::class, $agenda->movie);
    }

    public static function attributeDataProvider(): array
    {
        return [
            ['seats'],
            ['start_date'],
        ];
    }
}
