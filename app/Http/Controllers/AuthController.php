<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show Registration Page
    public function showRegister()
    {
        return view('auth.register');
    }

    // Handle User Registration
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:15',
            'gender' => 'required|string',
            'location' => 'required|string',
            'role' => 'required|in:customer,mechanic',
            'offered_services' => 'nullable|string|required_if:role,mechanic',
            'working_hours' => 'nullable|string|required_if:role,mechanic',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create User
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'gender' => $validatedData['gender'],
            'location' => $validatedData['location'],
            'role' => $validatedData['role'],
            'offered_services' => $validatedData['offered_services'] ?? null,
            'working_hours' => $validatedData['working_hours'] ?? null,
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    // Show Login Page
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
    }

    // Handle Logout
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('index'); // Redirect to the home page after logout
}

}
