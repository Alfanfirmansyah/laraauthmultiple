<?php

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

use App\Http\Middleware\CekStatus;
use App\Http\Middleware\CekStatusC;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=> CekStatus::class], function(){
    Route::get('home', 'HomeController@index')->name('home');
    Route::group(['namespace' => 'Admin'], function(){
        Route::get('test', function () {
            echo"haha";
        });
    });
});



Route::group(['middleware'=> CekStatusC::class], function(){
    Route::get('guest', 'GuestController@index')->name('guest');
    Route::group(['namespace' => 'Customer'], function(){
        Route::get('testc', function () {
            echo"haha hehe";
        });
    });
});
