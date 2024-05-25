<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    static $perPage = 48;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        if ($search) {
            // TODO: use full-text search
            /** @var LengthAwarePaginator */
            $paginate = Employer::with("jobs")
                ->where("name", "like", "%$search%")
                ->paginate(self::$perPage);

            $employers = $paginate->withQueryString();
        } else {
            /** @var LengthAwarePaginator */
            $paginate = Employer::with("jobs")->paginate(self::$perPage);
            $employers = $paginate->withQueryString();
        }

        // redirect if page number is too high
        if ($paginate->currentPage() > $paginate->lastPage()) {
            return redirect($paginate->url($paginate->lastPage()));
        }

        // redirect to first page if page number is less than 1
        if ($paginate->currentPage() < 1) {
            return redirect($paginate->url(1));
        }

        return view("employers/index", ["employers" => $employers]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Employer $employer)
    {
        $search = $request->search;

        if ($search) {
            // TODO: use full-text search
            /** @var LengthAwarePaginator */
            $paginate = $employer
                ->jobs()
                ->where("position", "like", "%$search%")
                ->paginate(self::$perPage);

            $jobs = $paginate->withQueryString();
        } else {
            /** @var LengthAwarePaginator */
            $paginate = $employer->jobs()->paginate(self::$perPage);
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

        return view("employers/view", [
            "employer" => $employer,
            "jobs" => $jobs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employer $employer)
    {
        return view("employers/edit", ["employer" => $employer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Employer $employer)
    {
        $employer->update(request()->all());
        return redirect(route("employers.show", $employer));
    }
}
