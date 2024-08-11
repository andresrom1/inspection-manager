<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Taker;
use App\Models\User;

class TakersCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function se_puede_crear_un_tomador () 
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'type' => 100,
        ]);

        $data = [
            'name' => 'Juan Perez',
            'email' => 'juan@gmail.com',
            'phone' =>'3516280778'
        ];

        $response = $this
            ->actingAs($user)
            ->post('takers', $data);
        
        $this->assertCount(1, Taker::all());
    
    }

    /** @test */
    public function se_puede_actualizar_un_tomador()
    {
        $this->withoutExceptionHandling();
        
        $user = User::factory()->create([
            'type' => 100,
        ]);

        $data = [
            'name' => 'Juan Perez',
            'email' => 'juan@gmail.com',
            'phone' => '3516280778'
        ];

        $response = $this
            ->actingAs($user)
            ->post('takers', $data);
            
        $this->assertCount(1, Taker::all());
        
        $taker = Taker::firstOrFail();
        
        $data = [
            'name' => 'Pedro Lopez',
            'email' => 'pedro@gmail.com',
            'phone' => '3512213017'
        ];
        
        $response = $this
        ->actingAs($user)
        ->post("'takers/' . $taker->id" , $data);
        
        $this->assertCount(1, Taker::all());
        
        $taker = Taker::firstOrFail();
        
        $this->assertEquals('Pedro Lopez', $taker->name);
        $this->assertEquals('email', $taker->email);
        $this->assertEquals('3512213017', $taker->phone);

    }
}
