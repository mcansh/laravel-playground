<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get("/", fn() => view("home"));

Route::get("/contact", fn() => view("contact"));

Route::resource("/jobs", JobController::class);

Route::resource("/employers", EmployerController::class);

Route::controller(TagController::class)->group(function () {
    Route::get("/tags", "index")->name("tags.index");
    Route::get("/tags/{tag}", "show")->name("tags.show");
});
