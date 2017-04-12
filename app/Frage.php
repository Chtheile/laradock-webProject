<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frage extends Model
{
    //
    protected $fillable = ['name',
    'body',
    'author',
    'type',
    'media',
    'filepath',
    'antwort1',
    'antwort2',
    'antwort3',
    'antwort4',
    'antwortLink1',
    'antwortLink2',
    'antwortLink3',
    'antwortLink4',
    'antwortLink1type',
    'antwortLink2type',
    'antwortLink3type',
    'antwortLink4type'];
}
