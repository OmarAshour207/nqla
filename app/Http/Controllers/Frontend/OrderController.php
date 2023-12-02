<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\OrderOperations;
use App\Models\City;
use App\Models\Load;
use App\Models\Price;
use App\Models\Truck;
use App\Models\TruckType;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use OrderOperations;
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
        $quantity = $data['quantity'];

        for ($i = 0; $i < count($address) - 1;$i++) {
            // get the city from the database to get the price
            $city = $address[$i]['city'];
            $cityParts = explode(' ', $city);

            $city = City::when($cityParts, function ($query) use ($cityParts) {
                for ($j = 0;$j < count($cityParts);$j++) {
                    if ($j == 0)
                        $query->whereTranslation('name', $cityParts[$j]);
                    else
                        $query->orWhereTranslation('name', $cityParts[$j]);
                }
            })->first();

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
        $total += ($total * $commission) + $tripOpenValue * $quantity;

        return response()->json([
            'total'         => (float) number_format($total, 2, '.', ''),
            'commission'    => $commission,
            'open_value'    => $tripOpenValue,
            'total_distance'=> $totalDistance
        ]);
    }


}
