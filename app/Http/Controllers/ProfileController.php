<?php

// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update(Request $request)
{
    // Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:15',
        'location' => 'nullable|string',
        'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
    ]);

    $user = Auth::user();

    // If a new profile image is uploaded
    if ($request->hasFile('profile_img')) {
        // Check if the previous image exists and delete it
        if ($user->profile_img) {
            Storage::delete('public/' . $user->profile_img);
        }

        // Store the new image
        $path = $request->file('profile_img')->store('profile_images', 'public');

        // Update user profile image path in the database
        $user->profile_img = $path;
    }

    // Update other details
    $user->name = $request->input('name');
    $user->phone = $request->input('phone');
    $user->location = $request->input('location');

    // Save the user record
    $user->save();

    return redirect()->route('profile')->with('success', 'Profile updated successfully!');
}
}