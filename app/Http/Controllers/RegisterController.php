<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validate input (Option B - no password confirmation)
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'firstname' => ['nullable', 'string', 'max:255'],
            'surname'   => ['nullable', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password'  => ['required', Password::defaults()],
            'password_confirmation' => ['nullable', 'string'],
        ]);

        // Create the user
        $user = User::create([
            'firstname' => $request->firstname,
            'surname'   => $request->surname,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        // Optional: login the user immediately
        Auth::login($user);

        // Redirect after successful registration
        return Redirect::route('dashboard'); // or wherever you want
    }
}