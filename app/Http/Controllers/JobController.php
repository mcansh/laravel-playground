<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = Job::count();
        $pageParam = request("page");
        $page = is_numeric($pageParam) ? (int) $pageParam : null;
        $perPage = 10;
        // determine if there are more pages
        $hasMore = $count > $page * $perPage;

        if ($page == 1) {
            return redirect()->route("jobs.index");
        }

        $page ??= 1;

        if ($page > ceil($count / $perPage)) {
            return redirect()->route("jobs.index");
        }

        $jobs = Job::skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get();

        return view("jobs/listings", [
            "jobs" => $jobs,
            "page" => $page,
            "hasMore" => $hasMore,
            "search" => request("search"),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("jobs/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $job = new Job();
        $job->fill(
            request()->only(["position", "location", "salary", "company"]),
        )->save();
        return redirect()->route("jobs.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view("jobs/listing", ["job" => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view("jobs/edit", ["job" => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $job->fill(
            request()->only(["position", "location", "salary", "company"]),
        )->save();
        return redirect()->route("jobs.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route("jobs.index");
    }
}
