<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Broker>
 */
class BrokerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->randomNumber(7, true),
            'bank' => $this->faker->randomElement(['BCA' ,'BRI', 'MANDIRI']),
            'bank_number' => $this->faker->randomNumber(7, true),
            'status' => $this->faker->randomElement(['active' ,'suspended', 'withdraw']),
        ];
    }
}
