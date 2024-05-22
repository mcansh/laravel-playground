<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Employer $employer)
    {
        return view("employers/view", ["employer" => $employer]);
    }
}
