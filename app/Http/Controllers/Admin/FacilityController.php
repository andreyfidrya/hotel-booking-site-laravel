<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Facility\SaveRequest;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();        

        return view('admin.facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('admin.facilities.create');
    }

    public function store(SaveRequest $request)
    {
        $data = $request->only(['name']);

        Facility::create($data);

        return redirect()
            ->route('admin.facilities.index')
            ->with('success', 'Удобство успешно добавлено');
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

    public function update(SaveRequest $request, Facility $facility)
    {
        $data = $request->only(['name']);

        $facility->update($data);

        return redirect()
        ->route('admin.facilities.index')
        ->with('success', 'Удобство успешно обновлено');
    }

    public function destroy(string $id)
    {
        //
    }
}
