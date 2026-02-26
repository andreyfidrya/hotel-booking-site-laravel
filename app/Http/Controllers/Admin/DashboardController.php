<?php

namespace App\Http\Controllers\Admin;

use App\Models\House;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
        $houses = House::all();        

        return view('admin.houses', compact('houses'));
    }
}
