<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // protected makes this work $article->published_at->addDays(2)->diffForHumans());
    protected $dates = ['published_at'];
    //we zijn expliciet in welke items kunnen worde veranderend of aangemaakt
    protected $fillable=[
    'title',
    'body',
    'published_at'
    ];
    //assign a name in a where clausule
    //nu kan je Article::published()  geeft de datum
    public function scopePublished($query)
    {
    $query->where('published_at','<=',Carbon::now());
    }

    public function setPublishedAtAttribute($date)
    {
    $this->attributes['published_at']= Carbon::parse($date);
    }

    //een artikel  is van een gebruiker
    public function user()
    {
    return $this->belongsTo('App\User');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
