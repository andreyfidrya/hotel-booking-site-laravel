<?php

namespace App\Http\Controllers\Admin;

use App\Models\Housetype;
use App\Models\Facility;
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
        $facilities = Facility::all();
        
        return view('admin.housetypes.create', compact('facilities'));
    }

    public function store(SaveRequest $request)
    {
        $data = $request->only(['name', 'facilities']);

        Housetype::create($data);

        return redirect()
            ->route('admin.housetypes.index')
            ->with('success', 'Тип домика успешно добавлен');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $housetype = Housetype::with('facilities')->findOrFail($id);
        $facilities = Facility::all();
    
        return view('admin.housetypes.edit', compact('housetype', 'facilities'));
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
