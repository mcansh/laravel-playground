<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        // validate
        $attributes = $request->validate([
            "first_name" => ["required"],
            "last_name" => ["required"],
            "email" => ["required", "email"],
            "password" => ["required", Password::min(8), "confirmed"], // 'confirmed' requires a matching field with _confirmation suffix
        ]);

        // create user
        $user = User::create($attributes);

        // login
        Auth::login($user, true);

        // redirect
        return redirect(route("jobs.index"));
    }
}
