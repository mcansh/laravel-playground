<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::view("/", "home")->name("home");

Route::view("/contact", "contact");

Route::resource("jobs", JobController::class);

Route::resource("employers", EmployerController::class);

Route::resource("tags", TagController::class, [
    "only" => ["index", "show", "edit", "update", "destroy"],
]);

// Auth
Route::get("register", [RegisteredUserController::class, "create"])->name(
    "register",
);
Route::post("register", [RegisteredUserController::class, "store"])->name(
    "register.store",
);
Route::get("login", [SessionController::class, "create"])->name("login");
Route::post("login", [SessionController::class, "store"])->name("login.store");
Route::post("logout", [SessionController::class, "destroy"])->name("logout");
