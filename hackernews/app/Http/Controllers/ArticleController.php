<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comments;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    //deze constructor zorgt ervoor dat we moetten inloggen buiten de create en show methode
    public function __construct()
    {
        $this->middleware('auth',['except'=>'index','show']);
    }
    // //geeft all artikels in order by  desc
    public function index()
    {
        $article = Article::latest('published_at')->published()->get();
        return view('articles.index', compact('article'));
    }
    // function show is dus om een specifiek item te tonen
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }
    //aanmaken /creeren van
    public function create()
    {
        return view('articles.create');
    }
    public function store(article $article)
    {
        $comment  = new Comments();
        $userid = Auth::id();
        $comment->user_ID= $userid;
        $comment->text = request()->text;
        $article->comments()->save($comment);
        return back();
//
//        Auth::user()->articles()->create($request->all());
//        return redirect('articles');

    }
    //edit van artikel
    public function edit($id){
        $article = Article::findOrFail($id);
        return view('articles.edit',compact('article'));
    }
    //updaten
    public function update($id, ArticleRequest $request){
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect('articles');
    }
}
