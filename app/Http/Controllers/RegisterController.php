<?php

namespace App\Http\Controllers;

use App\Foundation\Lib\Status;
use App\Models\Course;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController
{

    use RegistersUsers;

    public function showRegistrationForm()
    {
        $data = [];
        $data['courses'] = Course::where('is_active', '=', Status::ACTIVE)->pluck('name', 'id');
        return view('auth.register', compact('data'));
    }
}
