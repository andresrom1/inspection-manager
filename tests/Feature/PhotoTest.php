<?php

namespace Tests\Feature;

use App\Models\Inspection;
use App\Models\Photo;
use App\Models\Taker;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Testing\File;
use Tests\TestCase;

class PhotoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_usuario_no_registrado_puede_cargar_una_foto () 
    {
        $this->withoutExceptionHandling();
        
        $user = User::factory()->create([
            'type' => 100,
        ]);

        $data = $this->makeInspection($user);

        $inspectionResponse = $this
            ->actingAs($user)
            ->post('/inspection', $data);
        
        $inspection = Inspection::find(1);

        $this->assertCount(1, Inspection::all());

        $photo = File::image( 'foto.jpg', 1200,980);

        $photoResponse = $this->post(route('photo.store' , ['inspection' => $inspection->id]), [
            'file' => $photo
        ]);

        $this->assertCount(1, Photo::all());
    }

    private function makeInspection($user) {

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

        return $data;
    }
    
}
