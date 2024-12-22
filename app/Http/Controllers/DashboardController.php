<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the Dashboard based on user role
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'customer') {
            return view('dashboard.customer');
        } elseif ($user->role === 'mechanic') {
            return view('dashboard.mechanic');
        }

        return redirect()->route('login');
    }
}

