<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function show()
    {
        return view('frontend.profile');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:255',
            'phone'     => 'required|digits:10,13',
            'image'     => 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->file('image')) {
            $imagePath = 'uploads/users/';
            Image::make($request->image)
                ->resize(165, 165)
                ->encode('jpg')->save(public_path($imagePath . $request->file('image')->hashName()));

            Image::make($request->image)
                ->resize(100, 100)
                ->encode('jpg')->save(public_path($imagePath . 'thumb_' . $request->file('image')->hashName()));

            $data['image'] = $request->file('image')->hashName();

            if (auth()->user()->image && auth()->user()->image != 'avatar.jpg') {
                File::delete(public_path('/uploads/users/' . auth()->user()->image));
                File::delete(public_path('/uploads/users/thumb_' . auth()->user()->image));
            }
        }

        User::whereId(auth()->user()->id)->update($data);

        return redirect()->back()->with('success', __('Data updated successfully!'));
    }

    public function showChangePwd()
    {
        return view('frontend.auth.changepwd');
    }

    public function updatePwd(Request $request)
    {
        $data = $request->validate([
            'old_password'      => 'required|string',
            'password'          => 'required|string|confirmed',
        ]);

        if(!Hash::check($data['old_password'], auth()->user()->password)) {
            return redirect()->back()->with('error', __("Old Password Doesn't match!"));
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($data['password'])
        ]);

        return back()->with("success", __("Password changed successfully!"));
    }
}
