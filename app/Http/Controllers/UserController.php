<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    /**

    */
    public function addUser(Request $request)
    {
        $tmp = $request->all();
        Log::info($request);
        Log::info($tmp);

        $validator = Validator::make($request->all(), [
          'name' => 'required|max:1',
        ]);
        $errors = $validator->errors();

        Log::info($errors);

        if ($validator->fails()) {
          Log::info('False');

        } else {
          Log::info('True');
            return $errors;
        }




/*
      $Response =   User::create(
                'name' => $request->input('user.name'),
                'email' => $request->input('user.email'),
                'password' => bcrypt($request->input('user.password')),
                'username' => $request->input('user.username'),
              ]);
*/

/*      return User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
          'username' => $data['username'],
      ]);

    //
  /*  $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
      ]);

     $create =   User::create($request->all());
     return response()->json($create);*/
    }

}
