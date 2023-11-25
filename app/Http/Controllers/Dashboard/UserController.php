<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $users = User::when(\request('type') == 'drivers', function ($query) {
            $query->drivers()->with('driverInfo');
        })->when(\request('type') == 'users' || !\request('type'), function ($query) {
            $query->users();
        })->when(\request('type') == 'admins', function ($query) {
                $query->admins();
            })
            ->orderBy('id', 'desc')
            ->paginate(50);

        $dir = \request('type') == 'drivers' ? 'drivers' : 'users';

        return view("dashboard.$dir.index", compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

        public function store(UserRequest $request)
    {
        $data = $request->validated();

        if ($request->image)
            $data['image'] = moveTempImage($request->image);

        User::create($data);

        session()->flash('success', __('Saved successfully'));
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $type)
    {
        $data = $request->validated();

        // upload new image
        if (filter_var($request->image, FILTER_VALIDATE_INT)) {
            $data['image'] = moveTempImage($request->image);
        }

        $type->update($data);

        session()->flash('success', __('Saved successfully'));
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        File::delete(public_path("uploads/users/" . $user->image));
        File::delete(public_path("uploads/users/thumb_" . $user->image));

        $user->delete();
        session()->flash('success', __('Deleted successfully'));
        return redirect()->route('users.index');
    }
}
