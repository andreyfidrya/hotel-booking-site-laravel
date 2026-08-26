<x-layouts.porto>

    <div class="container py-5">

        <div class="text-center mb-5">
            <h1>Бронирование успешно оформлено!</h1>

            <p class="mt-3">
                Спасибо за бронирование.
            </p>
        </div>

        <div class="col-lg-8 mx-auto">

            <h3>Детали бронирования</h3>

            <p>
                <strong>Домик:</strong>
                {{ $booking->house->name }}
            </p>

            <p>
                <strong>Дата заезда:</strong>
                {{ $booking->arrival_date }}
            </p>

            <p>
                <strong>Дата выезда:</strong>
                {{ $booking->departure_date }}
            </p>

            <p>
                <strong>Взрослые:</strong>
                {{ $booking->adults }}
            </p>

            <p>
                <strong>Дети:</strong>
                {{ $booking->children }}
            </p>

            <p>
                <strong>Стоимость:</strong>
                {{ $booking->amount }} грн
            </p>

            <p>
                <strong>Email:</strong>
                {{ $booking->email }}
            </p>

        </div>

        <div class="text-center mt-4">
            <a href="{{ route('home.index') }}" class="btn btn-primary">
                Вернуться на главную
            </a>
        </div>

    </div>

</x-layouts.porto>