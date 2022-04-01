<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SubjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.index');
});

Route::get('/profile', [ AdminController::class, 'profile'])->name('profile');
Route::get('/subjects', [ SubjectController::class, 'index'])->name('subjects');
Route::get('/course', [ AdminController::class, 'course'])->name('course');
Route::get('/exam', [ AdminController::class, 'exam'])->name('exam');
