<x-layouts.admin>
<b>Домик: </b>{{$booking->house->name}}<br>
<b>Гость: </b>{{$booking->full_name}}<br>
<b>Телефон: </b>{{$booking->phone}}<br>
<b>Почта: </b>{{$booking->email}}<br>
<b>Заезд: </b>{{$booking->arrival_date->format('Y-m-d')}}<br>
<b>Выезд: </b>{{$booking->departure_date->format('Y-m-d')}}<br>
<b>Взрослые: </b>{{$booking->adults}}<br>
<b>Дети: </b>{{$booking->children}}<br>
<b>Животные: </b>{{$booking->pets}}<br>
<b>Сумма: </b>{{$booking->amount}}<br>
<b>Статус: </b>{{$booking->status}}<br>
<a href="{{ route('admin.bookings.index') }}" type="button" class="btn btn-sm btn-success">
    Бронирования
</a>
<a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-sm btn-primary">
    Редактирование
</a>                        
<button type="submit" class="btn btn-sm btn-danger">
    Отмена
</button>                    
                        
</x-layouts.admin>