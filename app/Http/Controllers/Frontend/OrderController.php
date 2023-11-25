<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Load;
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
            'time'              => 'required|time',
            'truck_id'          => 'required|numeric',
            'truck_type_id'     => 'required|numeric',
            'load_id'           => 'required|numeric',
            'quantity'          => 'required|numeric',
            'insurance_price'   => 'required|numeric',
        ]);

        foreach ($data['address'] as $address) {
            // get the city from the database to get the price
            // calculate the distance between the two points to get the distance
            // get commission
            // get trip open value
        }
    }

}
