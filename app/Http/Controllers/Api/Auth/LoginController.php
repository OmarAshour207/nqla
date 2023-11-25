<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\BaseController;
use App\Http\Traits\VerifyUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends BaseController
{
    use VerifyUser;

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phonenumber' => 'sometimes|nullable|numeric',
            'email'     => 'sometimes|nullable',
            'password'  => 'required|string',
            'fcm_token' => 'required|string'
        ]);

        if($validator->fails())
            return $this->sendError(__('Validation Error.'), $validator->errors()->getMessages(), 422);

        $credentials = [
            'password' => $request->get('password')
        ];

        if($request->get('phonenumber'))
            $credentials['phonenumber'] = $request->get('phonenumber');
        elseif ($request->get('email'))
            $credentials['email'] = $request->get('email');
        else
            return $this->sendError(__('Auth Error!'), ['s_authError'], 401);

        if(Auth::attempt($credentials)) {
            $this->generateCode(['return' => true]);
            $user = Auth::user();
            $user->update(['fcm_token'  => $validator->validated()['fcm_token']]);

            return $this->sendResponse([], __('Please verify your email'));
        }

        return $this->sendError(__('Auth Error!'), [__('Auth Error!')], 401);

    }

    public function verify(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'code'      => 'required|numeric'
        ]);

        if($validator->fails())
            return $this->sendError(__('Validation Error.'), $validator->errors()->getMessages(), 422);

        $code = $validator->validated()['code'];
        $email = $validator->validated()['email'];

        $user = User::where('email', $email)->first();
        if (!$user)
            return $this->sendError(__('User not found!'), [__('User not found!')], 422);

        $verifyUser = $this->verifyUserCode($code, $user->id);

        if (!$verifyUser)
            return $this->sendError(__('Auth Error!'), [session()->get('error')], 422);


        $success['token'] = $user->createToken('nqla')->plainTextToken;
        return $this->sendResponse($success, __('Verified Successfully'));
    }

    public function resend(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
        ]);

        if($validator->fails())
            return $this->sendError(__('Validation Error.'), $validator->errors()->getMessages(), 422);

        $email = $validator->validated()['email'];

        $user = User::where('email', $email)->first();
        if (!$user)
            return $this->sendError(__('User not found!'), [__('User not found!')], 422);

        $this->generateCode(['return' => true, 'userId' => $user->id, 'email' => $user->email]);

        return  $this->sendResponse([
            'message'   => __('Code resend successfully')
        ], __('Code resend successfully'));
    }
}
