<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Models\Image;

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
Route::get('/login', function(Request $request) {
    return view('auth.login');
})->name('login');
Route::get('/login/error', function(Request $request) {
    return view('auth.login',['error'=>'error in login']);
})->name('login.error');

Route::get('/login/after', function(Request $request) {
    return view('auth.login',['error'=>'Đã tạo tài khoản và gửi email xác nhận']);
})->name('login.active');

Route::get('/register/error', function(Request $request) {
    return view('auth.register',['message'=>'error in signup']);
})->name('signup.error');

Route::get('/register', function (Request $request) {
    return view('auth.register');
});
Route::post('/register', 'App\Http\Controllers\UserController@create');


Route::get('/user', function(){
    return view('user.self');
});
Route::get('/forgotPassword', function(){
    return view('auth.forgot');
});
Route::get('/user/{id}', function($id){
    $user= new UserController;
    $data=$user->usss($id);
    return view('user.other')->with(['author'=>$data]);
});
Route::get('/image/{id}',[App\Http\Controllers\ImageController::class, 'show'] );

Route::get('/post', function () {
    return view('image.post');
});
Route::get('/image/{id}/edit',function($id){
    $image=Image::find($id);
    return view('image.edit',['image'=>$image]);
})->name('edit');

Route::get('/search/{name}/{id}',[App\Http\Controllers\ImageController::class, 'search']);
// Route::get('/favorite',function(){
//     return view('user.favorite');
// })->name('favorite');
Route::get('/favorite/{id}', 'App\Http\Controllers\FavoriteController@show')->name('favorite');
Route::get('/postedImage/{id}', 'App\Http\Controllers\ImageController@posted')->name('posted');

