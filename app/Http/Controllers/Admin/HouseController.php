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

        // Главное изображение
        $featuredImage = $request->file('featured_image');

        $featuredName = time() . '_' . $featuredImage->getClientOriginalName();

        $featuredImage->move(
            public_path('images'),
            $featuredName
        );

        $featuredPath = $featuredName;


        // Пути галереи
        $galleryPaths = [];

        foreach ($request->file('gallery_images') as $image) {

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(
                public_path('images'),
                $imageName
            );

            $galleryPaths[] = $imageName;
        }

        // Создание домика
        House::create([
            'name' => $data['name'],
            'housetype_id' => $data['housetype_id'],
            'featured_image' => $featuredPath,
            'galery_images' => implode(', ', $galleryPaths),
        ]);

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
