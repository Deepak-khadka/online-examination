<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use function view;

class AdminController extends Controller
{

    public function profile()
    {
        return view('admin.profile.index');
    }

    public function course()
    {
        return view('admin.course.index');
    }

    public function exam()
    {
        return view('admin.exam.index');
    }

}
