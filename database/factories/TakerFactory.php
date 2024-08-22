<?php

namespace Database\Factories;

use App\Models\Taker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Taker>
 */
class TakerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Taker::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->phoneNumber(),
            'adress' => fake()->address(),
            'id_type' => fake()->randomElement(['DNI', 'CUIL',  'CUIT']),
            'id_number' => fake()->numberBetween(5000000,55000000),
            'postal_code'=> fake()->postcode(),   
            
        ];
    }
}
