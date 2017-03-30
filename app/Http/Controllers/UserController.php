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
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'username' => 'required|unique:users',
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
    }

}
