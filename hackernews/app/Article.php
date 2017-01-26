<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    //we zijn expliciet in welke items kunnen worde veranderend of aangemaakt
    protected $fillable=[
        'title',
        'url'
    ];

    //een artikel  is van een gebruiker
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function comments()
    {
        return $this->hasMany('App\Comments');
    }
}
