<?php

use \Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'chat'], function () {
        Route::get('/', '\App\Http\Controllers\ChatController@index')->name('chat.index');
        Route::post('/register', '\App\Http\Controllers\ChatController@register')->name('chat.register');
    });
});
