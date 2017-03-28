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

        $validator = Validator::make($request->all(), [
          'name' => 'required|max:2',
        ]);
        $errors = $validator->errors();

        if ($validator->fails()) {
          Log::info($errors);
          return $errors;

        } else {
          $Response =   User::create($request->all());
            Log::info($Response);
            return $Response;
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
