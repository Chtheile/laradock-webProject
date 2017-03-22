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

Route::get('/', function () {
    return view('welcome');
    });

Route::get('login', array('uses' => 'HomeController@showLogin'));

Route::post('login', array('uses' => 'HomeController@doLogin'));
Auth::routes();

Route::get('home', 'HomeController@index');

Route::get('/settings',function (){
    return view('settings',['name' => 'Settings']);
})->middleware('auth');

Route::get('/chat', function (){
    return view('chat');
});

