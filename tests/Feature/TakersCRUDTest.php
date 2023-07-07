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
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

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
            ->post('/taker', $data);
        
        $this->assertCount(1, Taker::all());
    
    }
}
