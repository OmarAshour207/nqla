<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TruckTypeRequest;
use App\Models\Truck;
use App\Models\TruckType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TruckTypeController extends Controller
{
    public function index()
    {
        $types = TruckType::with('truck')
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('dashboard.trucks_types.index', compact('types'));
    }

    public function create()
    {
        $trucks = Truck::all();
        return view('dashboard.trucks_types.create', compact('trucks'));
    }

    public function store(TruckTypeRequest $request)
    {
        $data = $request->validated();

        if ($request->image)
            $data['image'] = moveTempImage($request->image);

        TruckType::create($data);

        session()->flash('success', __('Saved successfully'));
        return redirect()->route('types.index');
    }

    public function show(TruckType $truckType)
    {
        //
    }

    public function edit(TruckType $type)
    {
        $trucks = Truck::all();
        return view('dashboard.trucks_types.edit', compact('type', 'trucks'));
    }

    public function update(TruckTypeRequest $request, TruckType $type)
    {
        $data = $request->validated();

        // upload new image
        if (filter_var($request->image, FILTER_VALIDATE_INT)) {
            $data['image'] = moveTempImage($request->image);
        }

        $type->update($data);

        session()->flash('success', __('Saved successfully'));
        return redirect()->route('types.index');
    }

    public function destroy(TruckType $type)
    {
        File::delete(public_path("uploads/trucks_types/" . $type->image));
        File::delete(public_path("uploads/trucks_types/thumb_" . $type->image));

        $type->delete();
        session()->flash('success', __('Deleted successfully'));
        return redirect()->route('types.index');
    }
}
