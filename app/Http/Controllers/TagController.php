<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view("tags/view", ["tag" => $tag]);
    }
}
