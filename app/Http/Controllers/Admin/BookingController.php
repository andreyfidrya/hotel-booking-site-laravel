<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Booking\Save as SaveRequest;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();               
        
        return view('admin.bookings.index', compact('bookings'));
    }

     public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);         

        return view('admin.bookings.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id); 
        
        $statuses = [ 'неоплаченный', 'оплачен', 'отменен' ];

        return view('admin.bookings.edit', compact('booking', 'statuses'));
    }

    public function update(SaveRequest $request, Booking $booking)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
