<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\Booking;
use App\Services\BookingPriceCalculator;
use App\Http\Requests\Booking\Save as SaveRequest;

class BookingController extends Controller
{
    public function index(House $house)
    {
        $houses = House::with('housetype')->get();
        
        return view('booking', [
            'houses' => $houses,
            'selectedHouse' => $house
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

    public function store(SaveRequest $request)
    {
        $validated = $request->validated();

        $data = $request->only(['house_id', 'arrival_date', 'departure_date', 'adults', 'children', 'pets', 'full_name','phone', 'email']);

        return redirect()->route('booking.success');
    }
    
}