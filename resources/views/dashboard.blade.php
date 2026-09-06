<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Кабинет
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Текущие бронирования --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">

                <div class="p-6">

                    <h3 class="text-lg font-semibold text-gray-900 mb-4">
                        Мои текущие бронирования
                    </h3>

                    @if($currentBookings->count())

                        <div class="space-y-4">

                            @foreach($currentBookings as $booking)

                            <div class="border rounded-lg p-4">

                                <div class="flex justify-between items-start">

                                    <div>
                                        <h4 class="font-semibold text-gray-900">
                                            {{ $booking->house->name }}
                                        </h4>

                                        <p class="text-sm text-gray-600 mt-1">
                                            Заезд:
                                            {{ $booking->arrival_date->format('d.m.Y') }}
                                        </p>

                                        <p class="text-sm text-gray-600">
                                            Выезд:
                                            {{ $booking->departure_date->format('d.m.Y') }}
                                        </p>
                                    </div>

                                    <div class="text-right">

                                        <p class="font-semibold">
                                            {{ number_format($booking->amount, 0, ',', ' ') }} грн
                                        </p>

                                        <p class="text-sm text-gray-500 mt-1">
                                            {{ $booking->status }}
                                        </p>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <p class="text-gray-500">
                        У вас пока нет текущих бронирований.
                    </p>

                @endif

            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <h3 class="text-lg font-semibold text-gray-900 mb-4">
                        Архив бронирований
                    </h3>

                    @if($archiveBookings->count())

                        <div class="space-y-4">

                            @foreach($archiveBookings as $booking)

                                <div class="border rounded-lg p-4 bg-gray-50">

                                    <div class="flex justify-between items-start">

                                        <div>
                                            <h4 class="font-semibold text-gray-900">
                                                {{ $booking->house->name }}
                                            </h4>

                                            <p class="text-sm text-gray-600 mt-1">
                                                Заезд:
                                                {{ $booking->arrival_date->format('d.m.Y') }}
                                            </p>

                                            <p class="text-sm text-gray-600">
                                                Выезд:
                                                {{ $booking->departure_date->format('d.m.Y') }}
                                            </p>
                                        </div>

                                        <div class="text-right">

                                            <p class="font-semibold">
                                                {{ number_format($booking->amount, 0, ',', ' ') }} грн
                                            </p>

                                            <p class="text-sm text-gray-500 mt-1">
                                                {{ $booking->status }}
                                            </p>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <p class="text-gray-500">
                            Архив бронирований пуст.
                        </p>

                    @endif

                </div>

            </div>

        </div>
</x-app-layout>
