<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    //
    public function index(){
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

//    function show is dus om een specifiek item te tonen, we zien ook wat je meot doen als die niet bestaat

    public function show($id){
        $article = Article::findOrFail($id);

//        dd('show');
//        if(is_null($article)){
//         abort(404);
//        }


       return view('articles.show',compact('article'));
    }

    public function create(){

        return view('articles.create');
    }
}
