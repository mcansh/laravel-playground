<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use App\Helpers\SharedHelper;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request("search");
        $pageParam = request("page");
        $page = is_numeric($pageParam) ? (int) $pageParam : null;
        $perPage = 10;

        if ($page == 1) {
            return redirect()->route(
                "jobs.index",
                SharedHelper::dropQueryParams("page"),
            );
        }

        $page ??= 1;

        if ($search) {
            // find jobs that match the search query
            // by position, or related employer name,
            // or related tag name
            $jobs = Job::where("position", "like", "%$search%")
                ->where("position", "like", "%$search%")
                ->orWhereHas("employer", function ($query) use ($search) {
                    $query->where("name", "like", "%$search%");
                })
                ->orWhereHas("tags", function ($query) use ($search) {
                    $query->where("name", "like", "%$search%");
                })
                ->paginate($perPage);

            return view("jobs/index", [
                "jobs" => $jobs,
                "search" => $search,
                "page" => $page,
            ]);
        }

        $count = Job::count();

        if ($page > ceil($count / $perPage)) {
            return redirect()->route(
                "jobs.index",
                SharedHelper::dropQueryParams("page"),
            );
        }

        $jobs = Job::paginate($perPage);

        return view("jobs/index", [
            "jobs" => $jobs,
            "page" => $page,
            "search" => request("search"),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employerId = request("employer");
        if ($employerId) {
            $employer = Employer::find($employerId);
            if (!$employer) {
                return redirect()->route("employers.index");
            }
        }

        return view("jobs/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        if (request("employer_id")) {
            $employer = Employer::find(request("employer_id"));
        } else {
            $employer = Employer::firstOrCreate([
                "name" => request("employer"),
            ]);
        }

        $job = Job::create([
            "position" => request("position"),
            "location" => request("location"),
            "salary" => request("salary"),
            "employer_id" => $employer->id,
        ]);

        return redirect()->route("jobs.show", ["job" => $job]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view("jobs/show", ["job" => $job]);
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
    public function update(Job $job)
    {
        $employer = Employer::firstOrCreate(["name" => request("employer")]);

        $job->update([
            "position" => request("position"),
            "location" => request("location"),
            "salary" => request("salary"),
            "employer_id" => $employer->id,
        ]);

        return redirect()->route("jobs.show", ["job" => $job]);
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
