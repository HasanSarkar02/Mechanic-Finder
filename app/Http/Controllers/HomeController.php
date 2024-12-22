<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Apply 'auth' middleware to the homepage only, not the index
        $this->middleware('auth')->only('homepage');
    }

    /**
     * Show the application landing page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index'); // The landing page accessible to everyone
    }

    /**
     * Show the user's homepage (authenticated users only).
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function homepage()
    {
        return view('dashboard.customer');
    }
}
