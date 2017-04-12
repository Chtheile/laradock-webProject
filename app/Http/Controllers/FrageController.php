<?php

namespace App\Http\Controllers;

use App\Frage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FrageController extends Controller
{
    //

    public function frageId($id)
    {
      $text = Frage::find($id);
      Log::info($text);
      return $text;
    }




}
