<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\InsuranceRequest;
use App\Models\City;
use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function index()
    {
        $insurances = Insurance::with('city')
            ->orderBy('id', 'desc')
            ->paginate(50);

        return view('dashboard.insurances.index', compact('insurances'));
    }

    public function create()
    {
        $cities = City::all();
        return view('dashboard.insurances.create', compact('cities'));
    }

    public function store(InsuranceRequest $request)
    {
        Insurance::create($request->validated());
        session()->flash('success', __('Saved successfully'));
        return redirect()->route('insurances.index');
    }

    public function show(Insurance $truckType)
    {
        //
    }

    public function edit(Insurance $insurance)
    {
        $cities = City::all();
        return view('dashboard.insurances.edit', compact('insurance', 'cities'));
    }

    public function update(InsuranceRequest $request, Insurance $insurance)
    {
        $insurance->update($request->validated());
        session()->flash('success', __('Saved successfully'));
        return redirect()->route('insurances.index');
    }

    public function destroy(Insurance $insurance)
    {
        $insurance->delete();
        session()->flash('success', __('Deleted successfully'));
        return redirect()->route('insurances.index');
    }
}
