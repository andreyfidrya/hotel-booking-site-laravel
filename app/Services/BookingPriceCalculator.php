<?php

namespace App\Services;

use App\Models\House;
use Carbon\Carbon;

class BookingPriceCalculator
{
    public function calculate(
        House $house,
        string $arrivalDate,
        string $departureDate,
        int $adults,
        int $children,
        bool $pets = false
    ): array {
        $arrival = Carbon::parse($arrivalDate);
        $departure = Carbon::parse($departureDate);

        $capacity = $house->housetype->capacity;

        if (($adults + $children) > $capacity) {
            throw new \InvalidArgumentException(
                "Максимальная вместимость домика {$capacity} человек."
            );
        }

        $extraAdultsPrice = 0;
        $extraChildrenPrice = 0;
        $petsPrice = 0;

        if ($adults > 2) {
            $extraAdultsPrice =
                ($adults - 2) * $house->housetype->price_per_extra_person;
        }

        if ($children > 2) {
            $extraChildrenPrice =
                ($children - 2) * $house->housetype->price_per_extra_child;
        }

        if ($pets) {
            $petsPrice = $house->housetype->pet_price;
        }

        $currentDay = $arrival->copy();

        $totalPrice = 0;
        $details = [];

        while ($currentDay->lt($departure)) {

            $basePrice = $currentDay->isWeekend()
                ? $house->housetype->price_on_weekends
                : $house->housetype->price_on_business_days;

            $dayPrice =
                $basePrice +
                $extraAdultsPrice +
                $extraChildrenPrice +
                $petsPrice;

            $details[] = [
                'date' => $currentDay->toDateString(),
                'day_type' => $currentDay->isWeekend()
                    ? 'Выходной'
                    : 'Будний',

                'base_price' => $basePrice,
                'extra_adults_price' => $extraAdultsPrice,
                'extra_children_price' => $extraChildrenPrice,
                'pets_price' => $petsPrice,

                'total_price' => $dayPrice,
            ];

            $totalPrice += $dayPrice;

            $currentDay->addDay();
        }        

        return [
            'total_days' => $arrival->diffInDays($departure),
            'details' => $details,                    
            'total_price' => $totalPrice,
        ];
    }
}