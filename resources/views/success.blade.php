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

            <hr>

            @auth

                <div class="alert alert-success">
                    <h4>Бронирование сохранено в вашем аккаунте</h4>

                    <p class="mb-0">
                        Вы можете войти в личный кабинет и просмотреть свои бронирования.
                    </p>
                </div>

                <div class="text-center mt-3">
                    <a href="{{ route('bookings.index') }}" class="btn btn-primary">
                        Мои бронирования
                    </a>
                </div>

            @else

                @if($user)

                    <div class="alert alert-info">
                        <h4>У вас уже есть аккаунт</h4>

                        <p>
                            Пользователь с email
                            <strong>{{ $booking->email }}</strong>
                            уже зарегистрирован.
                        </p>

                        <p class="mb-0">
                            Войдите в свой аккаунт, чтобы просматривать свои бронирования.
                        </p>
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            Войти в аккаунт
                        </a>
                    </div>

                @else

                    <div class="alert alert-info">
                        <h4>Хотите создать аккаунт?</h4>

                        <p>
                            У вас ещё нет аккаунта.
                        </p>

                        <p class="mb-0">
                            Зарегистрируйтесь, чтобы в дальнейшем удобно
                            просматривать свои бронирования.
                        </p>
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{ route('register') }}" class="btn btn-primary">
                            Зарегистрироваться
                        </a>
                    </div>

                @endif

            @endauth

        </div>

        <div class="text-center mt-4">
            <a href="{{ route('home.index') }}" class="btn btn-secondary">
                Вернуться на главную
            </a>
        </div>

    </div>

</x-layouts.porto>
