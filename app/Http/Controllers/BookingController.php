<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;

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


    public function store(Request $request)
    {
        //
    }
}
