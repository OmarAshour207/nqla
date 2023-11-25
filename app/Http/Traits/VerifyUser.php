<?php

namespace App\Http\Traits;

use App\Mail\SendOTPCode;
use App\Models\UserCode;
use Carbon\Carbon;

trait VerifyUser
{
    public function generateCode($options = array())
    {
        $return = isset($options['return']) ?? false;
        $userId = isset($options['userId']) ? $options['userId'] : auth()->user()->id;
        $email = isset($options['email']) ?  $options['email'] : auth()->user()->email;

        $code = rand(1000, 9999);

        UserCode::updateOrCreate([
            'user_id'   => $userId
        ],[
            'code'      => $code,
            'expire_at' => Carbon::now()->addMinutes(10)
        ]);

        sendMail($email, new SendOTPCode([
            'title'     => __('Mail from nqla to verify OTP code'),
            'code'      => $code
        ]));

        if (!$return) {
            \session()->flash('success', __('Code resend Successfully'));
            return redirect()->back();
        }
    }

    public function verifyUserCode($code, $id = null)
    {
        $userId = isset(auth()->user()->id) ? auth()->user()->id : $id;

        $userCode = UserCode::where('user_id', $userId)
            ->first();

        if (!$userCode) {
            session()->flash('error', __('User not found!'));
            return false;
        }

        if ($userCode->code != $code) {
            session()->flash('error', __('Code is not correct!'));
            return false;
        }

        if ($userCode->expire_at < Carbon::now()) {
            session()->flash('error', __('Code expired!'));
            return false;
        }

        session()->put('otp_code', $userCode->code);

        return true;
    }
}
