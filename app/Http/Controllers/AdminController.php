<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        
        $houses = House::all();
        //dd($houses);

        return view('admin.index', compact('houses'));
    }
}
