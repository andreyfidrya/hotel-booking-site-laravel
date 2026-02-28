<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();        

        return view('admin.facilities.index', compact('facilities'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $facility = Facility::findOrFail($id);

        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
