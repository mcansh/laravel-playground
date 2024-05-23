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
        return view("tags/index", ["tags" => Tag::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()

    /**
     * Store a newly created resource in storage.
     */
    // public function store()

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view("tags/show", ["tag" => $tag]);
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
    // public function update(Request $request, Tag $tag)

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Tag $tag)
}
