<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            "first_name" => "John",
            "last_name" => "Doe",
            "email" => fake()->unique()->safeEmail(),
        ]);

        Employer::factory()
            ->create([
                "name" => "United Wholesale Mortgage",
                "location" => "Pontiac, MI",
                "website" => "https://www.uwm.com/",
            ])
            ->jobs()
            ->create([
                "position" => "Senior UI Engineer",
                "salary" => 145_000,
            ]);

        // create 100 jobs at 1-10 jobs per employer
        Employer::factory(10)
            ->create()
            ->each(function ($employer) {
                Job::factory(random_int(1, 10))->create([
                    "employer_id" => $employer->id,
                ]);
            });
    }
}
