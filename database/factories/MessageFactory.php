<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $clientId = Client::inRandomOrder()->first()->id;

        return [
            'user_id' => $clientId, 
            'body' => fake()->paragraph,
            'priority' => fake()->randomElement(['normal', 'urgent']),
            'read' => fake()->boolean(),
        ];
    }
}
