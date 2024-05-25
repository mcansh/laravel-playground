<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function index()
    {
        return view("tags/index", ["tags" => Tag::withCount("jobs")->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tags/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tag::create(["name" => $request->name]);
        return redirect()->route("tags.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view("tags/show", ["tag" => $tag->load("jobs.employer")]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view("tags/edit", ["tag" => $tag]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->update(["name" => $request->name]);
        return redirect()->route("tags.show", ["tag" => $tag]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route("tags.index");
    }
}
