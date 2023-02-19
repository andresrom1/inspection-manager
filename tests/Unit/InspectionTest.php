<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class InspectionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_usuario_autenticado_recientemente_creado_es_type_10 ()
    {
        User::factory()->create();
        $user = User::first();        

        $response = $this
            ->actingAs($user);

        $response->assertTrue($user->type == 10);
    }


}
