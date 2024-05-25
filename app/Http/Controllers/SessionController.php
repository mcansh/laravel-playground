<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view("auth.login");
    }

    public function store(Request $request)
    {
        // validate
        $attributes = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        // attempt to login
        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                "email" => "Your provided credentials could not be verified.",
            ]);
        }

        // regenerate session token
        $request->session()->regenerate();

        // redirect
        return redirect(route("jobs.index"));
    }

    public function destroy()
    {
        Auth::logout();
        return redirect(route("home"));
    }
}
