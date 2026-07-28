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
    ): array
    {
        $arrival = Carbon::parse($arrivalDate);
        $departure = Carbon::parse($departureDate);

        $currentDay = $arrival->copy();

        $totalPrice = 0;

        while ($currentDay->lt($departure)) {

            if ($currentDay->isWeekend()) {
                $pricePerDay = $house->housetype->price_on_weekends;
            } else {
                $pricePerDay = $house->housetype->price_on_business_days;
            }

            $totalPrice += $pricePerDay;

            $currentDay->addDay();
        }

        return [
            'total_price' => $totalPrice
        ];
    }
}
