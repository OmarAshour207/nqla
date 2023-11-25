<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Traits\VerifyUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use VerifyUser;

    public function show()
    {
        return view('frontend.auth.register');
    }

    public function register(UserRequest $request)
    {
        $data = $request->validated();
        $password = bcrypt($data['password']);
        $data['password'] = $password;

        $user = User::create($data);

        if(Auth::attempt(['email' => $user->email, 'password' => $request->request->get('password')])) {

            $this->generateCode(['return' => true]);

            return view('frontend.auth.otp');
        }
    }
}
