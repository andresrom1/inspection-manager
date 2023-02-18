<?php

namespace Tests\Unit;

use App\Models\Taker;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class TakerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function un_tomador_no_existente_es_creado ()
    {
        $this->withoutExceptionHandling();
        
        $taker = Taker::create([
            'name' => 'Juan Perez',
            'email' => 'juan@gmail.com'
        ]);

        $this->assertCount(1, Taker::all());

    }
}
