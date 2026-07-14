<?php

namespace App\Http\Controllers\Admin;

use App\Models\House;
use App\Models\Housetype;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\House\Store as StoreRequest;
use App\Http\Requests\Admin\House\Update as UpdateRequest;

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

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        // Главное изображение
        $featuredImage = $request->file('featured_image');

        $featuredName = time() . '_' . $featuredImage->getClientOriginalName();

        $featuredImage->move(
            public_path('images/houses/featured'),
            $featuredName
        );

        $featuredPath = $featuredName;


        // Пути галереи
        $galleryPaths = [];

        foreach ($request->file('gallery_images') as $image) {

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(
                public_path('images/houses/gallery'),
                $imageName
            );

            $galleryPaths[] = $imageName;
        }        

        // Создание домика
        House::create([
            'name' => $data['name'],
            'housetype_id' => $data['housetype_id'],
            'featured_image' => $featuredPath,
            'gallery_images' => implode(', ', $galleryPaths),
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
        
        $housetypes = Housetype::all();
        
        $house = House::findOrFail($id);

        $galleryImages = explode(', ', $house->gallery_images);

        return view('admin.houses.edit', compact('house', 'housetypes', 'galleryImages'));
    }

    public function update(UpdateRequest $request, House $house)
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {

        // удаляем старое изображение
        $oldImage = public_path('images/houses/featured/' . $house->featured_image);

        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        // сохраняем новое
        $featuredImage = $request->file('featured_image');

        $featuredName = time() . '_' . $featuredImage->getClientOriginalName();

        $featuredImage->move(
            public_path('images/houses/featured'),
            $featuredName
        );

        $house->featured_image = $featuredName;
        }

        $galleryImages = [];

        if ($house->gallery_images) {
            $galleryImages = array_map('trim', explode(',', $house->gallery_images));
        }

        if ($request->filled('delete_gallery')) {

            foreach ($request->delete_gallery as $image) {

                $path = public_path('images/houses/gallery/' . $image);

                if (file_exists($path)) {
                    unlink($path);
                }

                $galleryImages = array_diff($galleryImages, [$image]);
            }
        }

        if ($request->hasFile('gallery_images')) {

            foreach ($request->file('gallery_images') as $image) {

                $imageName = time() . '_' . $image->getClientOriginalName();

                $image->move(
                    public_path('images/houses/gallery'),
                    $imageName
                );

                $galleryImages[] = $imageName;
            }
        }

        if (count($galleryImages) === 0) {
            return back()
                ->withErrors([
                    'gallery_images' => 'У домика должно быть хотя бы одно изображение галереи.'
                ])
                ->withInput();
        }

        $house->name = $data['name'];
        $house->housetype_id = $data['housetype_id'];
        $house->gallery_images = implode(', ', $galleryImages);

        $house->save();

        return redirect()
            ->route('admin.houses.index')
            ->with('success', 'Домик успешно обновлен');
    }

    public function destroy(string $id)
    {
        //
    }
}
