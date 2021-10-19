<?php

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Website;
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
});
//------- Ajax CRUD ------//
Route::get('/ajax',[TeacherController::class,'index']);

Route::get('/teacher/all',[TeacherController::class,'allData']);

Route::post('/teacher/store',[TeacherController::class,'storeData']);

Route::get('/',[Website::class,'index']);
