<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Traits\VerifyUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use VerifyUser;

    public function show()
    {
        if (\auth()->user())
                return redirect()->route('frontend.showotp');
        return view('frontend.auth.login');
    }

    public function login(LoginUserRequest $request)
    {
        $password = $request->request->get('password');
        $email = $request->request->get('email');
        $remember = $request->request->get('remember') == 'on';

        $authField = filter_var($email, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $user = User::where('email', $email)->first();

        if(!$user) {
            return response()->json([
                'error'     => __('The provided credentials do not match our records')
            ], 422);
        }


        if ($user->status != 1) {
            return response()->json([
                'error'     => __('Email is not active, Please contact Owner')
            ], 422);
        }

        if(Auth::attempt([$authField => $email, 'password' => $password], $remember)) {

            $this->generateCode(['return' => true]);

            return view('frontend.auth.otp');
        }

        return response()->json([
            'error'     => __('The provided credentials do not match our records')
        ], 422);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }
}
