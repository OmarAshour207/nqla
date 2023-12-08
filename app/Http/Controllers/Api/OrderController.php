<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Resources\TruckResource;
use App\Http\Traits\OrderOperations;
use App\Mail\OrderCreated;
use App\Models\Address;
use App\Models\City;
use App\Models\Order;
use App\Models\Price;
use App\Models\Truck;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends BaseController
{
    use OrderOperations;

    public function config()
    {
        $success = [];
        $trucks = Truck::with('types.loads')->get();

        $success['truck'] = TruckResource::collection($trucks);

        return $this->sendResponse($success, __("Data get successfully"));
    }

    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->get();

        return $this->sendResponse(OrderResource::collection($orders), __("orders"));
    }

    public function calculate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address'           => 'required|array',
            'date'              => 'required|date',
            'time'              => 'required',
            'truck_id'          => 'required|numeric',
            'truck_type_id'     => 'required|numeric',
            'load_id'           => 'required|numeric',
            'quantity'          => 'required|numeric',
            'insurance_price'   => 'required|numeric',
            'store'             => 'sometimes|nullable'
        ]);

        if($validator->fails())
            return $this->sendError(__('Validation Error.'), $validator->errors()->getMessages(), 422);

        $data = $validator->validated();

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
                return $this->sendError(__("City error"), [__('City not supported')], 422);

            $price = Price::where('city_id', $city->id)
                ->where('truck_id', $data['truck_id'])
                ->where('truck_type_id', $data['truck_type_id'])
                ->first();

            if (!$price)
                return $this->sendError(__("Truck error"), [__('Truck not supported')], 422);

            // calculate the distance between the two points to get the distance
            $kilometers = $this->calculateDistance($address[$i], $address[$i+1]);
            $kilometers = (float) number_format($kilometers, 3, '.', '');
            $totalDistance += $kilometers;

            $total += $price->price * $kilometers;
        }
        $success = [];
        $success['sub_total'] = (float) number_format(($total * $quantity), 2, '.', '');
        $total += ($success['sub_total'] * $commission) + $tripOpenValue + $success['sub_total'];


        $success['total'] = (float) number_format($total, 2, '.', '');
        $success['commission']    = $commission;
        $success['open_value']    = $tripOpenValue;
        $success['total_distance'] = $totalDistance;

        if (isset($data['store']) && $data['store']) {
            $this->store(array_merge($success, $data));
        }

        return $this->sendResponse($success, __("Success"));
    }

}
