<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs/listings', ['jobs' => Job::all()]);
});

Route::get('/jobs/create', function () {
    return view('jobs/create');
});

Route::post('/jobs/create', function () {
    $job = new Job();
    $job->position = request('position');
    $job
        ->fill(request()->only(['position', 'location', 'salary', 'company']))
        ->save();
    return redirect('/jobs');
});

Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    if (!$job) abort(404);
    return view('jobs/edit', ['job' => $job]);
});

Route::post('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    if (!$job) abort(404);
    $job
        ->fill(request()->only(['position', 'location', 'salary', 'company']))
        ->save();
    return redirect('/jobs');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    if (!$job) abort(404);
    return view('jobs/listing', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
