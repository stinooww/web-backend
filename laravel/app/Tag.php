<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    public function articles(){
        return $this->belongsToMany('App\Article','tags_pivot',"article_id");
    }
}
