<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comments;
use App\User;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    //deze constructor zorgt ervoor dat we moetten inloggen buiten de create en show methode
    public function __construct()
    {
        $this->middleware('auth',['only'=>'create']);
    }

    public function index()
    {
        $articles = article::with('User','comments')->orderBy('votes','desc')->get()->values()->all();
        return view('articles.index', compact('articles'));

    }

//    // function show is dus om een specifiek item te tonen
////    public function show($id)
////    {
////        $article = Article::findOrFail($id);
////        return view('articles.show', compact('article'));
////    }

    //aanmaken /creeren van
    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
      {
        //  $input = $request->all();
        //  $input['userID'] = Auth::user()->id;
//          $input['published_at'] = Carbon::now();
          //Auth::user();

         // Article::create($input);
       Auth::user()->articles()->create($request->all());
//        $article->save();
//        $article = new Article;
//        $article->posted_by = Auth::user()->name;
        return redirect('articles');
//
//        Auth::user()->articles()->create($request->all());


      }
//    public function up($id ,Request $request)
//    {
//
//        $article = Article::findOrFail($id);
//        $article->votes += 1;
//        $article->update($request->all());
//        return redirect()->back();
//    }
//    public function down($id ,Request $request)
//    {
//        $article = Article::findOrFail($id);
//
//        $article->votes -= 1;
//        $article->update($request->all());
//        return redirect()->back();
//    }
    public function upvote(article $article)
    {
        try{
            $article->increment('votes');
            session()->flash('flash_message','successfully upvoted '.$article->title.'.');
            return back();
        }
        catch (\Exception $e){
            session()->flash('flash_error', 'Something went wrong while upvoting your article, try again.');
            return back();
        }
    }
    public function downvote(article $article)
    {
        try{
            $article->decrement('votes');
            session()->flash('flash_message','successfully downvoted '.$article->title.'.');
            return back();
        }
        catch (\Exception $e){
            session()->flash('flash_error', 'Something went wrong while downvoting your article, try again.');
            return back();
        }
    }
}
