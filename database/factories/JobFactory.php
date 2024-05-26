<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "position" => $this->faker->jobTitle(),
            // salary between $50,000 and $250,000 per year in cents
            "salary" => $this->faker->numberBetween(5_000_000, 25_000_000),
            "employer_id" => Employer::factory(),
        ];
    }
}
