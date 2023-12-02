<?php

namespace App\Http\Traits;

use Carbon\Carbon;

trait OrderOperations
{
    public function calculateDistance($source, $destination): float
    {
        $earthRadius = 6371;
        $srcLat = deg2rad($source['lat']);
        $srcLng = deg2rad($source['lng']);
        $destLat = deg2rad($destination['lat']);
        $destLng = deg2rad($destination['lng']);

        $lonDelta = $destLng - $srcLng;

        $a = pow(cos($destLat) * sin($lonDelta), 2) +
            pow(cos($srcLat) * sin($destLat) - sin($srcLat) * cos($destLat) * cos($lonDelta), 2);

        $b = sin($srcLat) * sin($destLat) + cos($srcLat) * cos($destLat) * cos($lonDelta);

        $angle = atan2(sqrt($a), $b);

        return $angle * $earthRadius;
    }

    public function generateTrackId()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $trackNumber = '';
        $length = 10;

        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $trackNumber .= $characters[$index];
        }

        return $trackNumber;
    }
}
