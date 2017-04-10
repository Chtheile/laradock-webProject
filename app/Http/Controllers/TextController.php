<?php

namespace App\Http\Controllers;
use App\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class TextController extends Controller
{
    //



    public function test(Request $request)
    {

     Log::info($request->get('name'));
     $text = new Text(array(
          'name' => $request->get('name'),
          'body'  => $request->get('body'),
          'author'  => $request->get('author'),
          'type'  => $request->get('type'),
        ));

     $path = $request->file('uploadFile')->store('test');
      Log::info($path);

      $text->media = $path;


      //Storage::disk('local')->put('file.txt', 'Contents');
      //$url = Storage::url('Bild1.jpg');
      //$contents = Storage::get('Bild1.jpg');
      $Response =     $text->save();

        Log::info($Response);
        return $Response;


    }

     public function getContend(Request $request)
    {

      return ['status' => 'OK'];
    }
}
