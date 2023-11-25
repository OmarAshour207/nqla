<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TruckRequest;
use App\Models\Media;
use App\Models\Truck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TruckController extends Controller
{
    public function index()
    {
        $trucks = Truck::orderBy('id')->paginate(20);

        return view('dashboard.trucks.index', compact('trucks'));
    }

    public function create()
    {
        return view('dashboard.trucks.create');
    }

    public function store(TruckRequest $request)
    {
        $data = $request->validated();

        if ($request->image)
            $data['image'] = moveTempImage($request->image);

        Truck::create($data);

        session()->flash('success', __('Saved successfully'));
        return redirect()->route('trucks.index');
    }

    public function show(Truck $truck)
    {
        //
    }

    public function edit(Truck $truck)
    {
        return view('dashboard.trucks.edit', compact('truck'));
    }

    public function update(TruckRequest $request, Truck $truck)
    {
        $data = $request->validated();

        // upload new image
        if (filter_var($request->image, FILTER_VALIDATE_INT)) {
            $data['image'] = moveTempImage($request->image);
        }

        $truck->update($data);

        session()->flash('success', __('Saved successfully'));
        return redirect()->route('trucks.index');
    }

    public function destroy(Truck $truck)
    {
        File::delete(public_path("uploads/trucks/" . $truck->image));
        File::delete(public_path("uploads/trucks/thumb_" . $truck->image));

        $truck->delete();
        session()->flash('success', __('Deleted successfully'));
        return redirect()->route('trucks.index');
    }

}
