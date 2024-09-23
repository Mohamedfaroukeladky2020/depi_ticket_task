<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('phone', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/tickets');
        }
        return redirect()->back()->withErrors(['login' => 'Login failed!']);
    }

    public function showLoginForm()
    {
        return view('login'); // Assuming your login page is in resources/views/auth/login.blade.php
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',

            'phone' => 'required|string|max:15|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the user
        $user = User::create([
            'name' => $request->input('name'),

            'phone' => $request->input('phone'),
            'password' => $request->input('password'),
        ]);

        // Optionally, you can log in the user after registration
        // Auth::login($user);

        return redirect()->route('login')->with('success', 'Registration successful.');
    }

}

