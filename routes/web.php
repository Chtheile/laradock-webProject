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

Route::get('datatables', 'DatatablesController@getIndex')
    ->name('datatables');
Route::get('datatables.data', 'DatatablesController@getAddEditRemoveColumnData')
    ->name('datatables.data');


// Route for log in needed
Route::get('login', array('uses' => 'HomeController@showLogin'));

Route::post('login', array('uses' => 'HomeController@doLogin'));

Auth::routes();
// end login route


Route::get('home', 'HomeController@index');

//Settings Route
Route::get('/settings',function (){
    return view('settings',['name' => 'Settings']);
})->middleware('auth');

//chat Route
Route::get('/chat', function (){
    return view('chat');
})->middleware('auth');

