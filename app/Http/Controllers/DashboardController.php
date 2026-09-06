<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
    $currentBookings = auth()->user()
        ->bookings()
        ->whereDate('departure_date', '>=', today())
        ->orderBy('arrival_date')
        ->get();

    $archiveBookings = auth()->user()
        ->bookings()
        ->whereDate('departure_date', '<', today())
        ->orderByDesc('arrival_date')
        ->get();

        return view('dashboard', compact('currentBookings','archiveBookings'));
    }
}
