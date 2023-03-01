<?php

namespace Tests\Feature;

use App\Models\Inspection;
use App\Models\Photo;
use App\Models\Taker;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Testing\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PhotoTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp (): void {
        parent::setUp();

        Storage::fake('public');
    }

    /** @test */
    public function un_usuario_no_registrado_puede_cargar_una_foto () 
    {
        $this->withoutExceptionHandling();
        
        $user = User::factory()->create([
            'type' => 100,
        ]);
        $data = $this->makeInspection($user);
        // dd($data);

        $inspectionResponse = $this
            ->actingAs($user)
            ->post('/inspection', $data);
        
        $inspection = Inspection::find(1);

        $this->assertCount(1, Inspection::all());

        $image = UploadedFile::fake()->image('user-image.jpg');

        $photoResponse = $this->post(route('photo.store' , ['inspection' => $inspection->id]), [
            'image' => $image,
            'width' => 850,
            'height' => 300,

        ])->assertStatus(201);

        Storage::disk('public')->assertExists('inspection-photo/' . $image->hashName());
        
        $uploadedPhoto = Photo::first();

        $this->assertEquals('inspection-photo/' . $image->hashName(), $uploadedPhoto->path);
        $this->assertEquals('850', $uploadedPhoto->width);
        $this->assertEquals('300', $uploadedPhoto->height);
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

        $data = array_merge( ['user_id' => $user->id], ['takerName' => $taker->name], ['takerEmail' => $taker->email], $inspection );

        return $data;
    }
    
}
