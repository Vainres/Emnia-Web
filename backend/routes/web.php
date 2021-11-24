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

Route::get('/', function (Request $request) {

    $obj=new ImageController;
    $pagedata=$obj->index();
    $pagedata=json_encode($pagedata);
    $pagedata=json_decode($pagedata);
    $Authorization=$request->header('Authorization');
    $request->session()->put('key','value');
    return $request->ip();
    return $Authorization;
    return response()->view('home',['pagedata'=>$pagedata,'Authorization'=>$Authorization])->cookie('Authorization','asdasdas',60);
})->name('home');
Route::get('/login', function(){
    $user= new UserController;
    $data=$user->usss(1);
    return view('login')->with(['data'=>$data])->withHeaders(['Authorization'=>"sdadas"]);
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/user/{id}', function($id){
    $user= new UserController;
    $data=$user->usss($id);
    // return $data->name;
    return view('login')->with(['data'=>$data]);
});
Route::get('/haha', function () {
    echo "haha";
    return view('welcome');
});
