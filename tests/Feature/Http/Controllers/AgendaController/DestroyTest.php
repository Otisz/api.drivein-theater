<?php

namespace Tests\Feature\Http\Controllers\AgendaController;

use App\Models\Agenda;
use Illuminate\Support\Str;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    public function testItRequiresAuthentication(): void
    {
        $this->deleteJson(route('agenda.destroy', Str::uuid7()->toString()))
            ->assertUnauthorized();
    }

    public function testItDestroysTheAgenda(): void
    {
        $this->login();

        $agenda = Agenda::factory()->create();

        $this->deleteJson(route('agenda.destroy', $agenda))
            ->assertNoContent();

        $this->assertSoftDeleted($agenda);
    }
}
