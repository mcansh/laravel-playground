<?php

namespace App\Http\Controllers;

use App\Models\Employer;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("employers/index", ["employers" => Employer::all()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employer $employer)
    {
        return view("employers/view", ["employer" => $employer]);
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
        return redirect()->route("employers.show", $employer);
    }
}
