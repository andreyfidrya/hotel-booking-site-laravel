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
                <th style="width: 20%; text-align: center;">Гость</th>
                <th style="width: 10%; text-align: center;">Телефон</th>
                <th style="width: 10%; text-align: center;">Почта</th>
                <th style="width: 10%; text-align: center;">Заезд</th>
                <th style="width: 10%; text-align: center;">Выезд</th>
                <th style="width: 5%; text-align: center;">Взрослые</th>
                <th style="width: 5%; text-align: center;">Дети</th>
                <th style="width: 5%; text-align: center;">Животные</th>
                <th style="width: 5%; text-align: center;">Сумма</th>
                <th style="width: 5%; text-align: center;">Статус</th>
                <th style="width: 10%; text-align: center;">Действия</th>
            </tr>
        </thead>
        <tbody>
               @foreach($bookings as $booking)               
                
                <tr>
                    <td style="text-align: center; vertical-align: middle;">{{$booking->house->name}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$booking->full_name}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$booking->phone}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$booking->email}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$booking->arrival_date->format('Y-m-d')}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$booking->departure_date->format('Y-m-d')}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$booking->adults}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$booking->children}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$booking->pets}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$booking->amount}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$booking->status}}</td>
                    <td style="text-align: center; vertical-align: middle;">
                        <a href="{{ route('admin.bookings.show', [ $booking->id ]) }}" type="button" class="btn btn-sm btn-success w-100 mb-2 house-calendar">
                            Просмотр
                        </a>
                        <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-sm btn-primary w-100 mb-2">
                            Редактирование
                        </a>
                        <form action="{{ route('admin.bookings.update-status', $booking->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <button 
                                type="submit" 
                                class="btn btn-sm btn-danger w-100"
                                onclick="return confirm('Вы действительно хотите отменить бронирование?')">
                                Отмена
                            </button>
                        </form> 
                    </td>                                  
                </tr>

                @endforeach             
        </tbody>        
    </table>
</x-layouts.admin>
