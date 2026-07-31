<?php

namespace App\Services;

use App\Models\House;
use Carbon\Carbon;
use InvalidArgumentException;

class BookingPriceCalculator
{
    public function calculate(
    House $house,
    string $arrivalDate,
    string $departureDate,
    int $adults,
    int $children,
    bool $pets = false
): array
{
    $arrival = Carbon::parse($arrivalDate);
    $departure = Carbon::parse($departureDate);

    if ($departure->lessThanOrEqualTo($arrival)) {
        throw new \InvalidArgumentException('Дата выезда должна быть позже даты заезда.');
    }

    $capacity = $house->housetype->capacity;

    if (($adults + $children) > $capacity) {
        throw new \InvalidArgumentException(
            "Максимальная вместимость домика {$capacity} человек."
        );
    }

    $currentDay = $arrival->copy();

    $totalPrice = 0;

    while ($currentDay->lt($departure)) {

        // Стоимость домика за текущие сутки
        if ($currentDay->isWeekend()) {
            $pricePerDay = $house->housetype->price_on_weekends;
        } else {
            $pricePerDay = $house->housetype->price_on_business_days;
        }

        // Базовая стоимость
        $dayPrice = $pricePerDay;

        // Доплата за взрослых
        if ($adults > 2) {
            $dayPrice += ($adults - 2) * 500;
        }

        // Первые два ребенка бесплатно
        if ($children > 2) {
            $dayPrice += ($children - 2) * 500;
        }

        // Домашнее животное
        if ($pets) {
            $dayPrice += 500;
        }

        $totalPrice += $dayPrice;

        $currentDay->addDay();
    }

    return [
        'total_price' => $totalPrice,
    ];
}
}