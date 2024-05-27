<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $perPage = 48;

        if ($search) {
            // find jobs that match the search query
            // by position, or related employer name,
            // or related tag name
            // TODO: use full-text search
            /** @var LengthAwarePaginator */
            $paginate = Job::with("employer")
                ->where("position", "like", "%$search%")
                ->orWhereHas("employer", function ($query) use ($search) {
                    $query->where("name", "like", "%$search%");
                })
                ->orWhereHas("tags", function ($query) use ($search) {
                    $query->where("name", "like", "%$search%");
                })
                ->paginate($perPage);

            $jobs = $paginate->withQueryString();
        } else {
            /** @var LengthAwarePaginator */
            $paginate = Job::with("employer")->paginate($perPage);
            $jobs = $paginate->withQueryString();
        }

        // redirect if page number is too high
        if ($paginate->currentPage() > $paginate->lastPage()) {
            return redirect($paginate->url($paginate->lastPage()));
        }

        // redirect to first page if page number is less than 1
        if ($paginate->currentPage() < 1) {
            return redirect($paginate->url(1));
        }

        return view("jobs/index", ["jobs" => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $employerId = $request->employer;
        if ($employerId) {
            $employer = Employer::find($employerId);
            if (!$employer) {
                return redirect(route("employers.index"));
            }
        }

        return view("jobs/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "position" => ["required", "min:3"],
            "salary" => ["required", "numeric"],
            "employer" => ["required", "string"],
        ]);

        if ($request->employer_id) {
            $employer = Employer::find($request->employer_id);
        } else {
            $employer = Employer::firstOrCreate(["name" => $request->employer]);
        }

        $job = Job::create([
            "position" => $request->position,
            "salary" => $request->salary,
            "employer_id" => $employer->id,
        ])
            ->tags()
            ->attach($tags);

        Mail::to($job->employer->user)->queue(new JobPosted($job));

        // create the job and attach the tags
        // $job->tags()->attach($tags);

        return redirect(route("jobs.show", ["job" => $job]));
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
    public function update(Request $request, Job $job)
    {
        $request->validate([
            "position" => ["required", "min:3"],
            "salary" => ["required", "numeric"],
            // optional tags
            "tags" => ["nullable", "string"],
        ]);

        $employer = $request->employer_id
            ? Employer::firstOrCreate(["name" => $request->employer])
            : null;

        $job->update([
            "position" => $request->position,
            "salary" => $request->salary,
            // update the employer if it was changed
            "employer_id" => $employer ? $employer->id : $job->employer_id,
        ]);

        return redirect(route("jobs.show", ["job" => $job]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect(route("jobs.index"));
    }
}
