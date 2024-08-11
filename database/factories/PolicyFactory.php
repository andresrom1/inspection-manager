<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Policy>
 */
class PolicyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'policyNumber' => $this->faker->unique()->randomNumber(6),
            'company' => $this->faker->company,
            'installments' => $this->faker->numberBetween(1, 4),
            'insuranceObject' => $this->faker->word,
            'fromDate' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'toDate' => $this->faker->dateTimeBetween('+1 year', '+5 years'),
            'policyUrl' => $this->faker->url,
        ];
    }
}
