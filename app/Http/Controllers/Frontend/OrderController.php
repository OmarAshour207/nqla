<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Load;
use App\Models\Price;
use App\Models\Truck;
use App\Models\TruckType;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show()
    {
        return view('frontend.orders.index');
    }

    public function create()
    {
        $trucks = Truck::all();
        $loads = Load::all();

        return view('frontend.orders.create', compact('trucks', 'loads'));
    }

    public function types(Request $request)
    {
        if ($request->ajax()) {
            $truckId = $request->request->get('truck_id');
            $types = TruckType::where('truck_id', $truckId)->get();

            return view('frontend.orders.ajax.types', compact('types'));
        }
    }

    public function calculate(Request $request)
    {
        $data = $request->validate([
            'address'           => 'required|array',
            'date'              => 'required|date',
            'time'              => 'required',
            'truck_id'          => 'required|numeric',
            'truck_type_id'     => 'required|numeric',
            'load_id'           => 'required|numeric',
            'quantity'          => 'required|numeric',
            'insurance_price'   => 'required|numeric',
        ]);

        $total = 0;
        $totalDistance = 0;
        $commission = 0.05;
        $tripOpenValue = 15;

        $address = $data['address'];

        for ($i = 0; $i < count($address) - 1;$i++) {
            // get the city from the database to get the price
            $city = $address[$i]['city'];
            $city = explode(' ', $city);
            $city = City::whereTranslation('name', $city[0])
                ->orWhereTranslation('name', $city[1])
                ->first();

            if (!$city)
                return response()->json([
                    'errors' => ['city' => __('City not supported')]
                ], 422);
            $price = Price::where('city_id', $city->id)
                ->where('truck_id', $data['truck_id'])
                ->where('truck_type_id', $data['truck_type_id'])
                ->first();

            if (!$price)
                return response()->json([
                    'errors' => ['city' => __('Truck not supported')]
                ], 422);

            // calculate the distance between the two points to get the distance
            $kilometers = $this->calculateDistance($address[$i], $address[$i+1]);
            $kilometers = (float) number_format($kilometers, 3, '.', '');
            $totalDistance += $kilometers;

            $total += $price->price * $kilometers;
        }
        $total += ($total * $commission) + $tripOpenValue;

        return response()->json([
            'total'         => (float) number_format($total, 2, '.', ''),
            'commission'    => $commission,
            'open_value'    => $tripOpenValue,
            'total_distance'=> $totalDistance
        ]);
    }

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
}
