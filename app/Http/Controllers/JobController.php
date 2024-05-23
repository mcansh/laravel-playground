<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $perPage = 100;

        if ($search) {
            // find jobs that match the search query
            // by position, or related employer name,
            // or related tag name
            // TODO: use full-text search
            /** @var LengthAwarePaginator */
            $paginate = Job::with("employer")
                ->where("position", "like", "%$search%")
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

        // if the page number is greater than the last page number,
        if ($jobs->currentPage() > $jobs->lastPage()) {
            return redirect()->route("jobs.index", [
                "page" => $jobs->lastPage(),
            ]);
        }

        // if the page number is less than 1,
        if ($jobs->currentPage() < 1) {
            return redirect()->route("jobs.index", ["page" => null]);
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
                return redirect()->route("employers.index");
            }
        }

        return view("jobs/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (request("employer_id")) {
            $employer = Employer::find($request->employer_id);
        } else {
            $employer = Employer::firstOrCreate(["name" => $request->employer]);
        }

        $tags = self::getTags($request->tags);

        $job = Job::create([
            "position" => $request->position,
            "location" => $request->location,
            "salary" => $request->salary,
            "employer_id" => $employer->id,
        ]);

        // create the job and attach the tags
        $job->tags()->attach($tags);

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
    public function update(Request $request, Job $job)
    {
        $employer = Employer::firstOrCreate(["name" => $request->employer]);
        $tags = self::getTags($request->tags);
        // update the job tags
        $job->tags()->sync($tags);

        $job->update([
            "position" => $request->position,
            "location" => $request->location,
            "salary" => $request->salary,
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

    protected function getTags(string $tags)
    {
        $tagNames = array_map(
            fn($tag) => str_replace(" ", "_", strtolower(trim($tag))),
            explode(",", $tags),
        );
        $tags = [];

        foreach ($tagNames as $tag) {
            $tag = Tag::firstOrCreate(["name" => $tag]);
            $tags[] = $tag->id;
        }

        return $tags;
    }
}
