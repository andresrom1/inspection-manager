<?php

namespace Tests\Feature;

use App\Models\Policy;
use App\Models\Taker;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class PolicyFtTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function un_tomador_puede_tener_una_poliza()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'type' => 100,
        ]);

        $taker = Taker::create([
            'name' => 'Juan Perez',
            'email' => 'juanperez@example.com',
            'phone' => '3516280778'
        ]);

        $data = [
            'taker_id' => $taker->id,
            'policyNumber' => $this->faker->unique()->randomNumber(6),
            'company' => $this->faker->company,
            'installments' => $this->faker->numberBetween(1, 4),
            'insuranceObject' => $this->faker->word,
            'fromDate' => $this->faker->dateTimeBetween('-1 year', '+1 year')->format('Y-m-d'),
            'toDate' => $this->faker->dateTimeBetween('+1 year', '+5 years')->format('Y-m-d'),
            'policyUrl' => $this->faker->url,
        ];

        $response = $this
            ->actingAs($user)
            ->post('/policy', $data);

        $this->assertCount(1,Policy::get());

    }
}
