<?php

namespace App\Http\Controllers;

use App\Kurse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class KurseController extends Controller
{
    //
    // legt einen Kurs an
    public function addKurse(Request $request)
    {

        $validator = Validator::make($request->all(), [
          'name' => 'required|max:255|unique:kurses',
          'description' => 'required|max:255|',
        ]);
        $errors = $validator->errors();
        if ($validator->fails()) {
          Log::info($errors);
          return $errors;

        } else {
          $Response =   Kurse::create($request->all());
            Log::info($Response);
            return $Response;
        }
    }
    public function kursUser(Request $request)
    {
        $kurses = $request->all();

        Log::info($kurses);
        $response = Kurse::find($request->get('id'))->users()->get();
        Log::info($response);

    }

}
