<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\Booking;
use App\Services\BookingPriceCalculator;
use App\Http\Requests\Booking\Save as SaveRequest;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index(House $house)
    {
        $houses = House::with('housetype')->get();

        $user = auth()->user();
        
        return view('booking', [
            'houses' => $houses,
            'selectedHouse' => $house,
            'user' => $user
        ]);
    }

    public function calculatePrice(Request $request,BookingPriceCalculator $calculator)
    {
        try {
        $house = House::with('housetype')->findOrFail($request->house_id);

        $result = $calculator->calculate(
            $house,
            $request->arrival_date,
            $request->departure_date,
            $request->adults,
            $request->children,
            $request->boolean('pets')
        );

        return response()->json($result);

        } catch (\InvalidArgumentException $e) {

        return response()->json([
            'error' => $e->getMessage()
        ], 422);

        }
    }

    public function store(
        SaveRequest $request,
        BookingPriceCalculator $calculator
    ) {
        $validated = $request->validated();

        $validated['arrival_date'] = Carbon::createFromFormat(
            'm/d/Y',
            $validated['arrival_date']
        )->format('Y-m-d');

        $validated['departure_date'] = Carbon::createFromFormat(
            'm/d/Y',
            $validated['departure_date']
        )->format('Y-m-d');

        $house = House::with('housetype')->findOrFail($validated['house_id']);

        $result = $calculator->calculate(
            $house,
            $validated['arrival_date'],
            $validated['departure_date'],
            $validated['adults'],
            $validated['children'],
            $request->boolean('pets')
        );

        $exists = Booking::where('house_id', $validated['house_id'])
        ->where('arrival_date', '<', $validated['departure_date'])
        ->where('departure_date', '>', $validated['arrival_date'])
        ->exists();

        if ($exists) {
            return back()
                ->withErrors([
                    'wrong_date' => 'Этот домик уже забронирован на выбранные даты.'
                ])
                ->withInput();
        }

        $userId = auth()->id();

        if (!$userId) {
            $user = \App\Models\User::where('email', $validated['email'])->first();

            if ($user) {
                $userId = $user->id;
            }
        }

        $booking = Booking::create([
            'house_id' => $validated['house_id'],
            'user_id' => $userId,
            'arrival_date' => $validated['arrival_date'],
            'departure_date' => $validated['departure_date'],
            'adults' => $validated['adults'],
            'children' => $validated['children'],
            'pets' => $request->boolean('pets'),

            'coupon_id' => null,

            'amount' => $result['total_price'],

            'full_name' => $validated['full_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],

            'status' => 'неоплаченный',
        ]);

        return redirect()->route('booking.success', $booking);
    }

    public function success(Booking $booking)
    {
        $booking->load('house');

        $user = \App\Models\User::where('email', $booking->email)->first();

        return view('success', [
        'booking' => $booking,
        'user' => $user,
        ]);
    }

    public function bookings()
    {
        
    }

    public function adminBookings()
    {
        
    }
    
}