<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job {
    public static function all() {
        return [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => 100_000,
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => 150_000,
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => 40_000,
            ]
        ];
    }

    public static function find(int $id) {
        return Arr::first(static::all(), fn($job) => $job['id'] == $id);
    }
}
