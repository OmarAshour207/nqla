<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PriceRequest;
use App\Models\City;
use App\Models\Price;
use App\Models\Truck;
use App\Models\TruckType;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::with('city', 'truck', 'truckType')
            ->orderBy('id', 'desc')
            ->paginate(50);

        return view('dashboard.prices.index', compact('prices'));
    }
    public function create()
    {
        $cities = City::all();
        $trucks = Truck::all();

        return view('dashboard.prices.create', compact('trucks', 'cities'));
    }

    public function getTypes(Request $request)
    {
        if ($request->ajax()) {
            $types = TruckType::where('truck_id', $request->get('truck_id'))->get();
            $typeId = $request->get('truck_type_id');
            return view('dashboard.prices.ajax.types', compact('types', 'typeId'));
        }
    }

    public function store(PriceRequest $request)
    {
        $data = $request->validated();

        Price::create($data);

        session()->flash('success', __('Saved successfully'));
        return redirect()->route('prices.index');
    }

    public function show(Price $price)
    {
        //
    }

    public function edit(Price $price)
    {
        $cities = City::all();
        $trucks = Truck::all();
        $type = TruckType::whereId($price->truck_type_id)->first();

        return view('dashboard.prices.edit', compact('price','trucks', 'type', 'cities'));
    }

    public function update(PriceRequest $request, Price $price)
    {
        $data = $request->validated();

        $price->update($data);

        session()->flash('success', __('Saved successfully'));
        return redirect()->route('prices.index');
    }

    public function destroy(Price $price)
    {
        $price->delete();
        session()->flash('success', __('Deleted successfully'));
        return redirect()->route('prices.index');
    }
}
