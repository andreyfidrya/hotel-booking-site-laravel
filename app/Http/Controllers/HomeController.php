<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Housetype;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function houses()
    {
        $houses = House::all();
        $housetypes = HouseType::with('houses')->get();        

        return view('houses', compact('houses','housetypes'));       
    }

    public function booking()
    {
        $houses = House::with('housetype')->get();
        
        return view('booking', compact('houses'));       
    }
}
