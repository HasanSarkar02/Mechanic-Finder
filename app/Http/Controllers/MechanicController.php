<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function index(Request $request)
    {
        // Get search query for location
        $location = $request->input('location');

        // Fetch mechanics, filtered by location if provided
        $mechanics = Mechanic::when($location, function ($query, $location) {
            return $query->where('location', 'LIKE', "%{$location}%");
        })->get();

        // Return the view with mechanics data
        return view('mechanics.index', compact('mechanics', 'location'));
    }
}
