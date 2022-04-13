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
        /* Validate the user for login */
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        $request->only($this->username(), 'password');

        /* Attempt the login */
        if ($this->attemptLogin($request)) {

            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            /* Check the role of the user and redirect to their specific route*/
            if(auth()->user()->user_type === UserType::TEACHER) {

                return redirect(url('/admin'));
            }

            return redirect(url('/student'));
        }

        /* Send if not attempt to the login */
        return  $this->sendLoginResponse($request);

    }


}
