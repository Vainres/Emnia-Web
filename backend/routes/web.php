<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
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

Route::get('/', [App\Http\Controllers\AuthController::class, 'showHome'])->name('home');
Route::get('/login', function(){
    return view('login');
})->name('login');
Route::get('/register', function () {
    return view('register');
});
Route::get('/user/{id}', function($id){
    $user= new UserController;
    $data=$user->usss($id);
    // return $data->name;
    return view('login')->with(['data'=>$data]);
});
Route::get('/post', function () {
    return view('post-page');
});
