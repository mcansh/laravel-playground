<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return redirect(route("jobs.index"));
});

Route::view("/contact", "contact");

Route::get("/jobs", [JobController::class, "index"])->name("jobs.index");
Route::get("/jobs/create", [JobController::class, "create"])->name(
    "jobs.create",
);
Route::post("/jobs", [JobController::class, "store"])
    ->name("jobs.store")
    ->middleware("auth");
Route::get("/jobs/{job}", [JobController::class, "show"])->name("jobs.show");
Route::get("/jobs/{job}/edit", [JobController::class, "edit"])
    ->name("jobs.edit")
    ->middleware("auth")
    ->can("update", "job");
Route::put("/jobs/{job}", [JobController::class, "update"])
    ->name("jobs.update")
    ->middleware("auth")
    ->can("update", "job");
Route::delete("/jobs/{job}", [JobController::class, "destroy"])
    ->name("jobs.destroy")
    ->middleware("auth")
    ->can("update", "job");
Route::get("/employers", [EmployerController::class, "index"])->name(
    "employers.index",
);
Route::get("/employers/create", [EmployerController::class, "create"])->name(
    "employers.create",
);
Route::post("/employers", [EmployerController::class, "store"])->name(
    "employers.store",
);
Route::get("/employers/{employer}", [EmployerController::class, "show"])->name(
    "employers.show",
);
Route::get("/employers/{employer}/edit", [
    EmployerController::class,
    "edit",
])->name("employers.edit");
Route::put("/employers/{employer}", [
    EmployerController::class,
    "update",
])->name("employers.update");
Route::delete("/employers/{employer}", [
    EmployerController::class,
    "destroy",
])->name("employers.destroy");

Route::get("/tags", [TagController::class, "index"])->name("tags.index");
Route::get("/tags/create", [TagController::class, "create"])->name(
    "tags.create",
);
Route::post("/tags", [TagController::class, "store"])->name("tags.store");
Route::get("/tags/{tag}", [TagController::class, "show"])->name("tags.show");
Route::get("/tags/{tag}/edit", [TagController::class, "edit"])->name(
    "tags.edit",
);
Route::put("/tags/{tag}", [TagController::class, "update"])->name(
    "tags.update",
);
Route::delete("/tags/{tag}", [TagController::class, "destroy"])->name(
    "tags.destroy",
);

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
