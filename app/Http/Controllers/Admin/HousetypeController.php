<?php

namespace App\Http\Controllers\Admin;

use App\Models\Housetype;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Housetype\Save as SaveRequest;

class HousetypeController extends Controller
{
    public function index()
    {
        $housetypes = Housetype::all();        

        return view('admin.housetypes.index', compact('housetypes'));
    }

    public function create()
    {
        return view('admin.housetypes.create');
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
        $housetype = Housetype::findOrFail($id);
    
        return view('admin.housetypes.edit', compact('housetype'));
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
