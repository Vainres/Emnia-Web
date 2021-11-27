<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CommentController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/auth/{provider}', 'App\Http\Controllers\SocialAuthController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'App\Http\Controllers\SocialAuthController@handleProviderCallback');

Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::post('/signup', 'App\Http\Controllers\UserController@create');
Route::get('/info/{id}', 'App\Http\Controllers\UserController@usss');
Route::get('/activation/{token}', 'App\Http\Controllers\UserController@activateUser')->name('user.activate');

Route::post('/resend-activation-mail','App\Http\Controllers\UserController@resendActivationMail');

Route::post('/request-reset-password','App\Http\Controllers\UserController@ResetPassword');
Route::get('/routeresetpassword/{token}', function($token) {
    return view('resetPassword')->with(['token'=>$token,'url'=>env('URL').'api/resetpassword']);
});
Route::post('/resetpassword','App\Http\Controllers\UserController@resetPasswordForUser');


Route::get('/images', 'App\Http\Controllers\ImageController@index')->name('all.images');


Route::get('/images/{id}/comment', 'App\Http\Controllers\CommentController@allComment')->name('all.comment');


Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('/user', UserController::class);
    Route::post('/uploadAvatar','App\Http\Controllers\UserController@uploadAvatar');
    Route::post('/uploadImage', 'App\Http\Controllers\ImageController@create');
    Route::post('/images/{id}/comment', 'App\Http\Controllers\CommentController@addComment')->name('add.comment');

});
// 
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
