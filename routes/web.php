<?php

use App\Models\Employer;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Tag;

Route::get("/", function () {
    return view("home");
});

Route::get("/jobs", function () {
    $count = Job::count();
    $pageParam = request("page");
    $page = is_numeric($pageParam) ? (int) $pageParam : null;
    $perPage = 10;
    // determine if there are more pages
    $hasMore = $count > $page * $perPage;

    if ($page == 1) {
        return redirect("/jobs");
    }

    $page ??= 1;

    if ($page > ceil($count / $perPage)) {
        return redirect("/jobs");
    }

    $jobs = Job::skip(($page - 1) * $perPage)
        ->take($perPage)
        ->get();

    return view("jobs/listings", [
        "jobs" => $jobs,
        "page" => $page,
        "hasMore" => $hasMore,
    ]);
});

Route::get("/jobs/create", function () {
    return view("jobs/create");
});

Route::post("/jobs/create", function () {
    $job = new Job();
    $job->fill(
        request()->only(["position", "location", "salary", "company"]),
    )->save();
    return redirect("/jobs");
});

Route::get("/jobs/{id}/edit", function ($id) {
    $job = Job::find($id);
    if (!$job) {
        abort(404);
    }
    return view("jobs/edit", ["job" => $job]);
});

Route::post("/jobs/{id}/edit", function ($id) {
    $job = Job::find($id);
    if (!$job) {
        abort(404);
    }
    $job->fill(
        request()->only(["position", "location", "salary", "company"]),
    )->save();
    return redirect("/jobs");
});

Route::get("/jobs/{id}", function ($id) {
    $job = Job::find($id);
    if (!$job) {
        abort(404);
    }
    return view("jobs/listing", ["job" => $job]);
});

Route::post("/jobs/{id}", function ($id) {
    $job = Job::find($id);
    if (!$job) {
        abort(404);
    }
    $job->delete();
    return redirect("/jobs");
});

Route::get("/contact", function () {
    return view("contact");
});

Route::get("/companies/{id}", function ($id) {
    $employer = Employer::find($id);
    if (!$employer) {
        abort(404);
    }
    return view("employers/view", ["employer" => $employer]);
});

Route::get("/tags/{id}", function ($id) {
    $tag = Tag::find($id);
    if (!$tag) {
        abort(404);
    }
    return view("tags/view", ["tag" => $tag]);
});
