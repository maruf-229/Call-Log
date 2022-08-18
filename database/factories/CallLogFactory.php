<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CallLog>
 */
class CallLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween('-5 days','now')->format('d F Y'),
            'phone_number' => $this->faker->phoneNumber(),
            'call_duration' => $this->faker->time('s'),
            'status' => '',
        ];
    }
}
