<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class TextController extends Controller
{
    //



    public function test(Request $request)
    {
      # code...
      Storage::disk('local')->put('file.txt', 'Contents');
      $url = Storage::url('Bild1.jpg');
      //$contents = Storage::get('Bild1.jpg');
      Log::info($url);
      //Log::info($contents);
      return ['status' => 'OK'];
    }

     public function getContend(Request $request)
    {

      return ['status' => 'OK'];
    }
}
