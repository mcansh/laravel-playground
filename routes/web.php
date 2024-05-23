<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get("/", fn() => view("home"));

Route::get("/contact", fn() => view("contact"));

Route::resource("/jobs", JobController::class);

Route::controller(EmployerController::class)->group(function () {
    Route::get("/employers", "index")->name("employers.index");
    Route::get("/employers/{employer}", "show")->name("employers.show");
    Route::get("/employers/{employer}/edit", "edit")->name("employers.edit");
    Route::put("/employers/{employer}", "update")->name("employers.update");
});

Route::controller(TagController::class)->group(function () {
    Route::get("/tags/{tag}", "show");
});
