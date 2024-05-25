<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::view("/", "home");

Route::view("/contact", "contact");

Route::resource("jobs", JobController::class);

Route::resource("employers", EmployerController::class);

Route::resource("tags", TagController::class, [
    "only" => ["index", "show", "edit", "update", "destroy"],
]);
