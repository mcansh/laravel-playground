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
            "location" =>
                $this->faker->city() . ", " . $this->faker->stateAbbr(),
            "salary" =>
                ($this->faker->numberBetween(30000, 100000) / 1000) * 1000,
            "employer_id" => Employer::factory(),
        ];
    }
}
