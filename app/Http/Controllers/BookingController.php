<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Services\BookingPriceCalculator;

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


    public function store(Request $request)
    {
        //
    }

    public function success()
    {
       return view('success');
    }
}