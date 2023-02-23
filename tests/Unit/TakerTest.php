<?php

namespace Tests\Unit;

use App\Models\Taker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TakerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function un_tomador_no_existente_es_creado ()
    {
        $this->withoutExceptionHandling();
        
        $taker = Taker::getTakerByData([
            'name' => 'Juan Perez',
            'email' => 'juan@gmail.com'
        ]);

        $this->assertCount(1, Taker::all());

    }

    /** @test */
    public function un_tomador_existente_es_devuelto_y_no_es_creado ()
    {
        $this->withoutExceptionHandling();
        
        Taker::create([
            'name' => 'Juan Perez',
            'email' => 'juan@gmail.com'
        ]);
        
        $taker = Taker::getTakerByData([
            'name' => 'Juan Perez',
            'email' => 'juan@gmail.com'
        ]);

        $this->assertCount(1, Taker::all());

    }
}
