<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\VerifyUser;
use App\Mail\SendOTPCode;
use App\Models\UserCode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerifyOtpController extends Controller
{
    use VerifyUser;

    public function showPage()
    {
        return view('dashboard.auth.verify');
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

        return redirect()->route('dashboard.index');
    }

}
