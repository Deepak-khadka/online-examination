<?php

use App\Foundation\Lib\UserType;
use App\Http\Controllers\StudentController;
use Copyleaks\Copyleaks;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], static function () {

    Route::get('/student', [ StudentController::class, 'index'])->name('student.home');
    Route::post('/question-list/{examId}/{subjectId}', [ StudentController::class, 'getQuestionsList'])->name('student.question-list');
    Route::get('/expire-question', [ StudentController::class, 'test'])->name('test');

});

Route::group(['prefix' => '/admin', 'as' => 'admin.', 'middleware' => 'admin'], static function () {
    include_once 'admin.php';
});

