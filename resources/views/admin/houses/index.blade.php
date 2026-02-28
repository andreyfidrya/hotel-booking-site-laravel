<x-layouts.admin>

    <h1 class="mb-4">Все Домики</h1>

    <a href="" 
       class="btn btn-success mb-4">
        Добавить домик
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 15%">Название</th>
                <th style="width: 25%">Описание</th>
                <th style="width: 10%">Тип</th>
                <th style="width: 20%">Основное фото</th>
                <th style="width: 20%">Галерея</th>
                <th style="width: 10%">Действия</th>
            </tr>
        </thead>
        <tbody>
                @foreach($houses as $house)               
                
                <tr>
                    <td style="text-align: center; vertical-align: middle;">{{$house->name}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$house->description}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$house->housetype->name}}</td>
                    <td style="text-align: center; vertical-align: middle;">
                        <img src="{{ asset('images/' . $house->featured_image) }}" 
                             width="220" height="200">
                    </td>
                    <td class="align-middle text-center">
                        @php
                            $images = explode(',', $house->galery_images);
                        @endphp

                        @foreach($images as $image)
                            <img src="{{ asset('images/' . trim($image)) }}"
                                width="150"
                                style="display: block; margin: 0 auto 10px;">
                        @endforeach
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                        <a href="" 
                           class="btn btn-sm btn-primary w-100 mb-2">
                            Редактировать
                        </a>
                        <form action="" 
                            method="POST"
                            onsubmit="return confirm('Удалить этот домик?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger w-100">
                                Удалить
                            </button>
                        </form>
                    </td>
                </tr>

                @endforeach
            
        </tbody>
    </table>

</x-layouts.admin>

