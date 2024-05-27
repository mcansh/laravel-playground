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
        // salary between $50,000 and $250,000 per year in cents rounded to the nearest thousand
        $salary = $this->faker->numberBetween(5000000, 25000000);
        $rounded = round($salary, -6); // using -6 because we save salary in cents
        return [
            "position" => $this->faker->jobTitle(),
            "salary" => $rounded,
            "employer_id" => Employer::factory(),
        ];
    }
}
