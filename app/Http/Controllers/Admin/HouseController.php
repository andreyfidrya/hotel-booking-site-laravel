<?php

namespace App\Http\Controllers\Admin;

use App\Models\House;
use App\Models\Housetype;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\House\Save as SaveRequest;

class HouseController extends Controller
{
    public function index()
    {
        $houses = House::all();        

        return view('admin.houses.index', compact('houses'));
    }

    public function create()
    {
        $housetypes = Housetype::all();    

        return view('admin.houses.create', compact('housetypes'));
    }

    public function store(SaveRequest $request)
    {
        $data = $request->validated();

        // 1. Загружаем главное изображение
        $featuredPath = $request->file('featured_image')
            ->store('houses/featured', 'public');

        // 2. Создаём домик
        $house = House::create([
            'name' => $data['name'],
            'housetype_id' => $data['housetype_id'],
            'featured_image' => $featuredPath,
        ]);

        // 3. Галерея (если есть)
        if ($request->hasFile('galery_images')) {
            foreach ($request->file('galery_images') as $image) {
                $path = $image->store('houses/gallery', 'public');

                // если у тебя есть relation images()
                $house->images()->create([
                    'path' => $path,
                ]);
            }
        }

        return redirect()
            ->route('admin.houses.index')
            ->with('success', 'Домик успешно создан');
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
