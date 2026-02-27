<?php

namespace App\Http\Controllers\Admin;

use App\Models\Housetype;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HousetypeController extends Controller
{
    public function index()
    {
        $housetypes = Housetype::all();        

        return view('admin.housetypes', compact('housetypes'));
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
        //
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
