<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\VerifyUser;
use Illuminate\Http\Request;

class VerifyOtpController extends Controller
{
    use VerifyUser;

    public function showPage()
    {
        if (session()->has('otp_code'))
            return redirect('home');
        return view('frontend.auth.showotp');
    }

    public function verifyCode(Request $request)
    {
        $data = $request->validate([
            'code'      => 'required|numeric'
        ]);
        $code = $data['code'];

        $verifyUser = $this->verifyUserCode($code);
        if (!$verifyUser)
            return redirect()->back();
        return redirect()->route('home');
    }
}
