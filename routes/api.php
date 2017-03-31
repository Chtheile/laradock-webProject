<?php

use Illuminate\Http\Request;

use App\Events\MessagePosted;

use App\Kurse;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('messages',function (){
    return App\Message::with('user')->get();
})->middleware('auth');

Route::get('users',function (){
    return App\User::latest()->paginate(5);
})->middleware('auth');


Route::post('messages',function (){
    $user = Auth::user();

   $message= $user->messages()->create([
        'message' => request()->get('message')
    ]);
    // Announce that a new message has been posted
    //abroadcast(new MessagePosted($message,$user))->toOthers();
    return ['status' => 'OK'];
})->middleware('auth');

Route::post('adduser', 'UserController@addUser')->middleware('auth');

Route::get('testKurse', function (){

  $user = Auth::user();
  $kurse = new Kurse (['name'=> 'Test','description' => 'Test kurs']);

  Log::info($user);

  $test = $user->kurses()->save($kurse);
  Log::info($test);
  return ['status' => 'OK'];
})->middleware('auth');
