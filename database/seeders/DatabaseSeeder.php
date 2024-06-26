<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
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

        $me = User::factory()->create([
            "first_name" => "Logan",
            "last_name" => "McAnsh",
            "email" => "logan@mcan.sh",
            "password" => "password",
        ]);

        Employer::factory()
            ->create([
                "name" => "United Wholesale Mortgage",
                "location" => "Pontiac, MI",
                "website" => "https://www.uwm.com/",
                "user_id" => $me->id,
            ])
            ->jobs()
            ->create([
                "position" => "Senior UI Engineer",
                "salary" => 14_500_000, // $145,000
            ])
            ->tags()
            ->createMany([
                ["name" => "UI"],
                ["name" => "Frontend"],
                ["name" => "React"],
                ["name" => "TypeScript"],
                ["name" => "CSS"],
                ["name" => "HTML"],
                ["name" => "JavaScript"],
                ["name" => "Node.js"],
                ["name" => "Remix"],
                ["name" => "Next.js"],
            ]);

        // create 100 jobs at 1-10 jobs per employer
        Employer::factory(10)
            ->create()
            ->each(function ($employer) {
                Job::factory(random_int(1, 10))->create([
                    "employer_id" => $employer->id,
                ]);
            });

        // create 10 tags
        Tag::factory(10)->create();

        // create or attach 1-5 tags to each job
        Job::all()->each(function ($job) {
            $job->tags()->attach(
                Tag::inRandomOrder()->limit(random_int(1, 5))->get(),
            );
        });
    }
}
