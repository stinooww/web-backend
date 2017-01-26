<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{

    //we zijn expliciet in welke items kunnen worde veranderend of aangemaakt
    protected $fillable=[
        'body'
    ];


    //een comment  is van een gebruiker
    public function user()
    {
        return $this->belongsTo(User::class,'article_id','id');
    }
    public function article()
    {
        return $this->belongsTo(Article::class,'article_id','id');
    }
}
