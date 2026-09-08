<x-app-layout>

```
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Кабинет
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Вкладки --}}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="border-b border-gray-200">

                <nav class="flex" aria-label="Tabs">

                    <button
                        type="button"
                        id="current-tab"
                        class="px-6 py-4 text-sm font-medium border-b-2 border-indigo-500 text-indigo-600"
                    >
                        Мои текущие бронирования
                    </button>

                    <button
                        type="button"
                        id="archive-tab"
                        class="px-6 py-4 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300"
                    >
                        Архив бронирований
                    </button>

                </nav>

            </div>
        </div>


        {{-- ========================= --}}
        {{-- ТЕКУЩИЕ БРОНИРОВАНИЯ --}}
        {{-- ========================= --}}

        <div id="current-bookings">

            @if($currentBookings->count())

                <div class="space-y-4">

                    @foreach($currentBookings as $booking)

                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">

                            <div class="p-6">

                                <div class="flex justify-between items-start">

                                    {{-- Левая часть --}}
                                    <div>

                                        <h3 class="text-lg font-semibold text-gray-900">
                                            {{ $booking->house->name }}
                                        </h3>

                                        <div class="mt-3 space-y-1 text-sm text-gray-600">

                                            <p>
                                                <span class="font-medium">Заезд:</span>
                                                {{ $booking->arrival_date->format('d.m.Y') }}
                                            </p>

                                            <p>
                                                <span class="font-medium">Выезд:</span>
                                                {{ $booking->departure_date->format('d.m.Y') }}
                                            </p>

                                            <p>
                                                <span class="font-medium">Взрослые:</span>
                                                {{ $booking->adults }}
                                            </p>

                                            <p>
                                                <span class="font-medium">Дети:</span>
                                                {{ $booking->children }}
                                            </p>

                                            <p>
                                                <span class="font-medium">Питомец:</span>

                                                @if($booking->pets)
                                                    Да
                                                @else
                                                    Нет
                                                @endif

                                            </p>

                                        </div>

                                    </div>


                                    {{-- Правая часть --}}
                                    <div class="text-right">

                                        <p class="text-xl font-semibold text-gray-900">
                                            {{ number_format($booking->amount, 0, ',', ' ') }} грн
                                        </p>

                                        <p class="mt-2 text-sm text-gray-500">
                                            Статус:
                                            {{ $booking->status }}
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-500">
                        У вас пока нет текущих бронирований.
                    </div>

                </div>

            @endif

        </div>


        {{-- ========================= --}}
        {{-- АРХИВ --}}
        {{-- ========================= --}}

        <div id="archive-bookings" class="hidden">

            @if($archiveBookings->count())

                <div class="space-y-4">

                    @foreach($archiveBookings as $booking)

                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">

                            <div class="p-6">

                                <div class="flex justify-between items-start">

                                    {{-- Левая часть --}}
                                    <div>

                                        <h3 class="text-lg font-semibold text-gray-900">
                                            {{ $booking->house->name }}
                                        </h3>

                                        <div class="mt-3 space-y-1 text-sm text-gray-600">

                                            <p>
                                                <span class="font-medium">Заезд:</span>
                                                {{ $booking->arrival_date->format('d.m.Y') }}
                                            </p>

                                            <p>
                                                <span class="font-medium">Выезд:</span>
                                                {{ $booking->departure_date->format('d.m.Y') }}
                                            </p>

                                            <p>
                                                <span class="font-medium">Взрослые:</span>
                                                {{ $booking->adults }}
                                            </p>

                                            <p>
                                                <span class="font-medium">Дети:</span>
                                                {{ $booking->children }}
                                            </p>

                                            <p>
                                                <span class="font-medium">Питомец:</span>

                                                @if($booking->pets)
                                                    Да
                                                @else
                                                    Нет
                                                @endif

                                            </p>

                                        </div>

                                    </div>


                                    {{-- Правая часть --}}
                                    <div class="text-right">

                                        <p class="text-xl font-semibold text-gray-900">
                                            {{ number_format($booking->amount, 0, ',', ' ') }} грн
                                        </p>

                                        <p class="mt-2 text-sm text-gray-500">
                                            Статус:
                                            {{ $booking->status }}
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-500">
                        Архив бронирований пуст.
                    </div>

                </div>

            @endif

        </div>

    </div>
</div>


{{-- Переключение вкладок --}}
<script>

    document.addEventListener('DOMContentLoaded', function () {

        const currentTab = document.getElementById('current-tab');
        const archiveTab = document.getElementById('archive-tab');

        const currentBookings = document.getElementById('current-bookings');
        const archiveBookings = document.getElementById('archive-bookings');


        currentTab.addEventListener('click', function () {

            currentBookings.classList.remove('hidden');
            archiveBookings.classList.add('hidden');

            currentTab.classList.add(
                'border-indigo-500',
                'text-indigo-600'
            );

            currentTab.classList.remove(
                'border-transparent',
                'text-gray-500'
            );

            archiveTab.classList.remove(
                'border-indigo-500',
                'text-indigo-600'
            );

            archiveTab.classList.add(
                'border-transparent',
                'text-gray-500'
            );

        });


        archiveTab.addEventListener('click', function () {

            currentBookings.classList.add('hidden');
            archiveBookings.classList.remove('hidden');

            archiveTab.classList.add(
                'border-indigo-500',
                'text-indigo-600'
            );

            archiveTab.classList.remove(
                'border-transparent',
                'text-gray-500'
            );

            currentTab.classList.remove(
                'border-indigo-500',
                'text-indigo-600'
            );

            currentTab.classList.add(
                'border-transparent',
                'text-gray-500'
            );

        });

    });

</script>

</x-app-layout>
