<?php

namespace App\Http\Controllers;


use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use App\Article;
use Illuminate\Support\Facades\Auth;


class ArticlesController extends Controller
{
    //gebruikers omleiden die niet zijn ingelogd
    public function __construct()
{
    $this->middleware('auth',['except'=>'index','show']);
}

    //
    public function index()
    {
        //geeft all article die order by zijn in desc
        $article = Article::latest('published_at')->published()->get();
        return view('articles.index', compact('article'));
    }

//    function show is dus om een specifiek item te tonen, we zien ook wat je meot doen als die niet bestaat

    public function show($id)
    {
        $article = Article::findOrFail($id);

//        dd('show');
//        if(is_null($article)){
//         abort(404);
//        }
        return view('articles.show', compact('article'));
    }

    public function create()
    {

        return view('articles.create');
    }

    //hoe krijgen wij toegang tot wa da de gebruiker intypt + validatie

    public function store(ArticleRequest $request){
//        $article = new Article($request->all()); //user_id
        Auth::user()->articles()->create($request->all());
        flash()->success('Your article has ben created');

//       Article::create($request->all());
       return redirect('articles');
    }


    public function edit($id){
        $article = Article::findOrFail($id);

        return view('articles.edit',compact('article'));
    }

    public function update($id, ArticleRequest $request){
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect('articles');
    }
}