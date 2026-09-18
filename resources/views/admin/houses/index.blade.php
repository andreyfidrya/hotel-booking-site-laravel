<x-layouts.admin>

    <h1 class="mb-4">Все домики</h1>

    <a href="{{ route('admin.houses.create') }}" 
       class="btn btn-success mb-4">
        Добавить домик
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 15%; text-align: center;">Название</th>
                <th style="width: 25%; text-align: center;">Описание</th>
                <th style="width: 10%; text-align: center;">Тип</th>
                <th style="width: 20%; text-align: center;">Основное фото</th>
                <th style="width: 20%; text-align: center;">Галерея</th>
                <th style="width: 10%; text-align: center;">Действия</th>
            </tr>
        </thead>
        <tbody>
                @foreach($houses as $house)               
                
                <tr>
                    <td style="text-align: center; vertical-align: middle;">{{$house->name}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$house->housetype->description}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$house->housetype->name}}</td>
                    <td style="text-align: center; vertical-align: middle;">
                        <img src="{{ asset('images/houses/featured/' . $house->featured_image) }}" 
                             width="220" height="200">
                    </td>
                    <td class="align-middle text-center">
                        @php
                            $images = explode(',', $house->gallery_images);
                        @endphp

                        @foreach($images as $image)
                            <img src="{{ asset('images/houses/gallery/' . trim($image)) }}"
                                width="150"
                                style="display: block; margin: 0 auto 10px;">
                        @endforeach
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                        <div class="position-relative">
                            <button type="button"
                                    class="btn btn-sm btn-success w-100 mb-2 house-calendar">
                                Календарь
                            </button>

                            <div class="calendar-container"></div>
                        </div>
                        <a href="{{ route('admin.houses.edit', $house) }}" class="btn btn-sm btn-primary w-100 mb-2">
                            Редактировать
                        </a>
                        <form action="{{ route('admin.houses.destroy', $house) }}" 
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

    @push('scripts')

    <script>
        
    $(document).ready(function () {

        $('.house-calendar').on('click', function () {

            let button = $(this);
            let container = button.siblings('.calendar-container');

            // Закрываем календарь
            if (container.hasClass('calendar-open')) {
                container.hide();
                container.removeClass('calendar-open');
                button.text('Календарь');

                return;
            }

            // Создаём календарь
            container.datepicker({
                format: 'yyyy-mm-dd',
                autoclose: false
            });

            container.show();
            container.datepicker('show');

            container.addClass('calendar-open');
            button.text('Закрыть');

        });

    });

    </script>

    @endpush    

</x-layouts.admin>



