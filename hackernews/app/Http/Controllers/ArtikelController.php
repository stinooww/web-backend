<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;

class ArtikelController extends Controller
{
    //







    public function store(article $article)
    {

        $comment  = new comment();
        $userid = Auth::id();
        $comment->user_ID= $userid;
        $comment->text = request()->text;
        $article->comments()->save($comment);

        return back();

    }
}
