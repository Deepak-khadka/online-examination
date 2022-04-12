<?php

namespace App\Http\Controllers;

use App\Foundation\Lib\UserType;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController
{

    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        $request->only($this->username(), 'password');

        if ($this->attemptLogin($request)) {

            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            if(auth()->user()->user_type === UserType::TEACHER) {

                return redirect(url('/admin'));
            }

            return redirect(url('/student'));
        }


        return  $this->sendLoginResponse($request);

    }


}
