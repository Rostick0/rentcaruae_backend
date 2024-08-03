<?php

namespace App\Utils;

use App\Models\Car;

class PeriodPrice
{
    public static function get(Car $car, $thisPeriod, $without_deposite)
    {
        $periods = [30, 7, 1];
        $currentPeriod = null;

        foreach ($periods as $i => $period) {
            if ($period <= $thisPeriod) {
                $currentPeriod = $period;
                break;
            }
        }

        $sum = round(
            ($car->price_special()->firstWhere([
                ['period', '=', $currentPeriod],
                ['is_show', '=', 1]
            ])?->price ?? $car->price()->firstWhere('period', $currentPeriod)?->price)
                * ($thisPeriod / $currentPeriod)
                * 100
        ) / 100 + ($without_deposite ? 45 * $thisPeriod : 0);

        return $sum + $sum * 0.05;
        //  .find((item) => item <= period);
    }
}
