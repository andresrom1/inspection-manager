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
use Illuminate\Http\Request as RequestForMiddleware;

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
        ])->assertstatus(201);
        
        $uploadedPhoto = Photo::first();

        $this->assertNotNull($uploadedPhoto->url);
        $this->assertNotNull($uploadedPhoto->url_thumb);
        $this->assertEquals(1,$uploadedPhoto->inspection_id);
        $this->assertCount(1, Photo::all());

    }

    /** @test */
    public function para_acceder_a_cargar_fotos_debe_coincidir_el_token_de_seguridad () {
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
        $this->assertNotNull($inspection->token, 'No existe $inspection->tokern');

        $response = $this->get(route('photo.checkMail', [
            'inspection' => $inspection->id,
            'token' => $inspection->token]))
            ->assertStatus(200);
    }

    /** @test */
    public function no_autorizado_si_token_no_coincide () {
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
        $this->assertNotNull($inspection->token, 'No existe $inspection->tokern');

        $response = $this->get(route('photo.checkMail', [
        'inspection' => $inspection->id,
        'token' => 'kjadskjahsd']))
        ->assertStatus(404);
    }

    /** @test */
    public function debe_coincidir_el_mail_ingresado_por_el_tomador_para_poder_realizar_la_inspeccion ()
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

        $response = $this->get(route('photo.checkMail', [
            'inspection' => $inspection->id,
            'token' => $inspection->token]))
            ->assertStatus(200);

        
        //dd($inspection->taker_id);

        $data = [
            'mail' => $inspection->taker->email,
        ];
     
        $response2 = $this
            ->post( route('photo.performCheck'),[
                'taker_id' => $inspection->taker_id,
                'email' => 'juan@gmail.com'] )
            ->assertStatus(200);

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
