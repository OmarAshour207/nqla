<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoadRequest;
use App\Models\Load;
use App\Models\Truck;
use App\Models\TruckType;
use Illuminate\Http\Request;

class LoadController extends Controller
{
    public function index()
    {
        $loads = Load::with('truck', 'truckType')
            ->orderBy('id', 'desc')
            ->paginate(50);

        return view('dashboard.loads.index', compact('loads'));
    }

    public function create()
    {
        $trucks = Truck::all();

        return view('dashboard.loads.create', compact('trucks'));
    }

    public function getTypes(Request $request)
    {
        if ($request->ajax()) {
            $types = TruckType::where('truck_id', $request->get('truck_id'))->get();
            $typeId = $request->get('truck_type_id');
            return view('dashboard.loads.ajax.types', compact('types', 'typeId'));
        }
    }

    public function store(LoadRequest $request)
    {
        $data = $request->validated();

        Load::create($data);

        session()->flash('success', __('Saved successfully'));
        return redirect()->route('loads.index');
    }

    public function show(Load $load)
    {
        //
    }

    public function edit(Load $load)
    {
        $trucks = Truck::all();
        $type = TruckType::whereId($load->truck_type_id)->first();

        return view('dashboard.loads.edit', compact('load','trucks', 'type'));
    }

    public function update(LoadRequest $request, Load $load)
    {
        $data = $request->validated();

        $load->update($data);

        session()->flash('success', __('Saved successfully'));
        return redirect()->route('loads.index');
    }

    public function destroy(Load $load)
    {
        $load->delete();
        session()->flash('success', __('Deleted successfully'));
        return redirect()->route('loads.index');
    }

}
