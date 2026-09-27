<x-layouts.admin>
    <h1 class="mb-4">Все бронирования</h1>

    <a href="{{ route('admin.bookings.create') }}" 
       class="btn btn-success mb-4">
        Добавить бронирование
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10%; text-align: center;">Домик</th>
                <th style="width: 30%; text-align: center;">Гость</th>
                <th style="width: 15%; text-align: center;">Заезд</th>
                <th style="width: 15%; text-align: center;">Выезд</th>
                <th style="width: 10%; text-align: center;">Сумма</th>
                <th style="width: 10%; text-align: center;">Статус</th>
                <th style="width: 10%; text-align: center;">Действия</th>
            </tr>
        </thead>
        <tbody>
               @foreach($bookings as $booking)               
                
                <tr>
                    <td style="text-align: center; vertical-align: middle;"></td>
                    <td style="text-align: center; vertical-align: middle;"></td>
                    <td style="text-align: center; vertical-align: middle;"></td>
                    <td style="text-align: center; vertical-align: middle;"></td>
                    <td style="text-align: center; vertical-align: middle;"></td>
                    <td style="text-align: center; vertical-align: middle;"></td>
                    <td style="text-align: center; vertical-align: middle;"></td>                                  
                </tr>

                @endforeach             
        </tbody>        
    </table>
</x-layouts.admin>
