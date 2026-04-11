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
        $data = $request->only(['name', 'description', 'capacity', 'area', 'price_per_extra_person', 'price_on_business_days', 'price_on_weekends']);

        $housetype = Housetype::create($data);  
        
        if ($request->has('facilities')) {
        $housetype->facilities()->sync($request->input('facilities', []));
        }

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

    public function destroy(Housetype $housetype)
    {
        $housetype->facilities()->detach(); 
        
        $housetype->delete();

        return redirect()
            ->route('admin.housetypes.index')
            ->with('success', 'Удобство успешно удалено');
    }
}
