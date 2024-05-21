<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

$jobs = [
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

Route::get('/jobs', function () use ($jobs) {
    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id) use ($jobs) {
    $job = Arr::first($jobs, fn($job) => $job['id'] == $id);

    if (!$job) abort(404);

    return view('job', [
        'job' => $job
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});
