<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\BaseController;
use App\Http\Traits\VerifyUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
    use VerifyUser;

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:20',
            'email'     => 'required|email:rfc|unique:users',
            'phone'     => 'required|unique:users|max:20',
            'password'  => 'required|string',
        ]);

        if($validator->fails())
            return $this->sendError(__('Validation Error.'), $validator->errors()->getMessages(), 422);

        $user = User::create($validator->validated());
        $this->generateCode(['return' => true, 'userId' => $user->id, 'email' => $user->email]);

        return $this->sendResponse([], __('User Registered Successfully, please verify email'));
    }
}
