<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tweet extends Model
{
    //Campos que se toman del request obtenido para ser almacenados en la base de datos
    use SoftDeletes;

    protected $fillable = [
        'id_tweet',
        'url',
        'screen_name',
        'imagen',
        'texto',
        'valoracion',
    ];
}
