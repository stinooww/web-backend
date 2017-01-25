<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{

    //we zijn expliciet in welke items kunnen worde veranderend of aangemaakt
    protected $fillable=[
        'body','user_id','article_id'
    ];


    //een comment  is van een gebruiker
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function artikel()
    {
        return $this->belongsTo('App\Article');
    }
}
