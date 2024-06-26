<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $city = $this->faker->city();
        $state = $this->faker->stateAbbr();

        return [
            "name" => $this->faker->company(),
            "location" => "{$city}, {$state}",
            "website" => $this->faker->url(),
            "user_id" => \App\Models\User::factory(),
        ];
    }
}
