<?php

namespace App\Http\Controllers;
use App\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
class TextController extends Controller
{
    //



    public function test(Request $request)
    {
      $path;
      Log::info($request);
      $user = Auth::user();
      $text = Text::find($request->get('id'));



      $text->name = $request->get('name');
      $text->body = $request->get('body');
      $text->author = $user->name;



      if (!$request->file('uploadFile')=='') {
        if (!$text->filepath==''){
          Storage::delete($text->filepath);

        }
        $path = $request->file('uploadFile')->store('public/test');
        $text->filepath =$path;
        if (\File::extension($path) == 'png' || \File::extension($path) == 'jpg') {
        $text->type = 'png' ;
        Log::info($text->type);
      }else {
        $text->type = \File::extension($path) ;
      }


        $text->media = Storage::url($path);


      }
      /*else {
          Storage::delete($text->filepath);
          $text->filepath = '';
          $text->media = '';
          $text->type = '';
      }*/
      $text->save();

    //  Log::info($text);
      return $text;
    }

    public function textID($id)
    {
      $text = Text::find($id);
      Log::info($text);
      return $text;
    }
}
