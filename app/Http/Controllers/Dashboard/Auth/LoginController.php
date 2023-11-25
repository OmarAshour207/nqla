<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Traits\VerifyUser;
use App\Mail\SendOTPCode;
use App\Models\UserCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use VerifyUser;

    public function showForm()
    {
        return view('dashboard.auth.login');
    }

    public function login(LoginUserRequest $request)
    {
        $password = $request->request->get('password');
        $email = $request->request->get('email');
        $remember = $request->request->get('remember') == 'on';

        $authField = filter_var($email, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        if(Auth::attempt([$authField => $email, 'password' => $password], $remember)) {
//            $request->session()->regenerate();

            $this->generateCode(['return' => true]);

            return redirect()->route('dashboard.showotp');
//            return redirect()->intended('dashboard/index');
        }

        return back()->withErrors([
            'email'     => __('The provided credentials do not match our records')
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('dashboard.login');
    }
}
