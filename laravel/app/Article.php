<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
protected $fillable=[

    'title',
    'body',
    'published_at'
];

public function scopePublished($query){
    $query->where('published_at','<=',Carbon::now());
}

public function setPublishedAtAttribute($date){
    $this->attributes['published_at']= Carbon::parse($date);
}

//een artikel  is van een gebruiker
public function user(){
    return $this->belongsTo('App\User');
}
}
