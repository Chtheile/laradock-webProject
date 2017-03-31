<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kurse extends Model
{
     protected $fillable = ['name','description'];


     public function users()
     {
       return $this->belongsToMana('App\User','user_kurse')->withTimestamps();
     }
}
