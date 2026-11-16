<?php

namespace App\Http\Controllers;

use App\Models\Booking;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
    
    $booking_email = Auth::user()->email;
    
    $current_user_bookings = Booking::where('email', $booking_email)
        ->whereDate('departure_date', '>=', today())
        ->orderBy('arrival_date')
        ->get();

    $archive_user_bookings = Booking::where('email', $booking_email)
        ->whereDate('departure_date', '<', today())
        ->orderBy('arrival_date')
        ->get();
    
        return view('dashboard', compact('current_user_bookings','archive_user_bookings'));
    }
}
