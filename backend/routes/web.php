<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;

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

    $obj=new ImageController;
    $pagedata=$obj->index();
    $pagedata=json_encode($pagedata);
    $pagedata=json_decode($pagedata);
    // return response($pagedata->data);
    return view('home')->with(compact(['pagedata']));
});
Route::get('/login', function(){
    $user= new UserController;
    $data=$user->usss(1);
    $data->Authorization=" sdf";
    return view('login')->with(['data'=>$data])->withHeaders(['Authorization'=>$data->Authorization]);
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
