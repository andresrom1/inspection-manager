<?php

namespace Tests\Feature;

use App\Models\Taker;
use App\Models\User;
use App\Models\Inspection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class InspeccionManagementTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function un_usuario_con_permisos_puede_crear_una_inspeccion ()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'type' => 100,
        ]);

        $taker = Taker::create([
            'name' => 'Juan Perez',
            'email' => 'juan@gmail.com'
        ]);
        
        $inspection = [
            'tipo' => 'auto',
            'dominio' => 'AB413BS',
            'compania' => 'LPS',
            'status' => 'pendiente'
        ];

        $data = array_merge( ['takerName' => $taker->name], ['takerEmail' => $taker->email], $inspection );

        $response = $this
            ->actingAs($user)
            ->post('/inspection', $data);
        
        $this->assertCount(1, Inspection::all());
        
        $inspection = Inspection::first();
        
        $storedTaker = Taker::find($inspection->taker_id);
        $this->assertEquals($taker->id, $inspection->taker_id);
        $this->assertEquals($taker->email, $storedTaker->email);

    }
    /** @test */
    public function un_usuario_sin_permisos_no_puede_crear_una_inspeccion ()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'type' => 90,
        ]);

        $taker = Taker::create([
            'name' => 'Juan Perez',
            'email' => 'juan@gmail.com'
        ]);
        
        $inspection = [
            'tipo' => 'auto',
            'dominio' => 'AB413BS',
            'compania' => 'LPS',
            'status' => 'pendiente'
        ];

        $data = array_merge( ['user_id' => $user->id], ['taker_name' => $taker->name], ['taker_email' => $taker->email], $inspection );

        $response = $this
            ->actingAs($user)
            ->post('/inspection', $data);

        $this->assertCount(0, Inspection::all());


    }

    // private function inspectionData()
    // {
    //     return [
    //         'user_id' => Auth::$user->id;

    //     ];
    // }
}
