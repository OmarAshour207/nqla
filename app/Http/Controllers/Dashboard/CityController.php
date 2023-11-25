<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('id', 'desc')->paginate(50);
        return view('dashboard.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('dashboard.cities.create');
    }

    public function store(CityRequest $request)
    {
        $data = $request->validated();

        City::create($data);

        session()->flash('success', __('Saved successfully'));
        return redirect()->route('cities.index');
    }

    public function show(City $city)
    {
        //
    }

    public function edit(City $city)
    {
        return view('dashboard.cities.edit', compact('city'));
    }

    public function update(CityRequest $request, City $city)
    {
        $data = $request->validated();
        $city->update($data);

        session()->flash('success', __('Saved successfully'));
        return redirect()->route('cities.index');
    }

    public function destroy(City $city)
    {
        $city->delete();
        session()->flash('success', __('Deleted successfully'));
        return redirect()->route('cities.index');
    }
}
