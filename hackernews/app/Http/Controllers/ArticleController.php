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
        $this->middleware('auth', ['only' => 'create']);
    }

    public function index()
    {
        $articles = article::with('User', 'comments')->orderBy('votes', 'desc')->get()->values()->all();
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

    public function store(ArticleRequest $Arequest)
    {
        //  $input = $request->all();
        //  $input['userID'] = Auth::user()->id;
//          $input['published_at'] = Carbon::now();
        //Auth::user();

        // Article::create($input);
        try {
            Auth::user()->articles()->create($Arequest->all());
//        $article->save();
//        $article = new Article;
//        $article->posted_by = Auth::user()->name;
//            $request->session()->flash('flash_message', 'Task was successful!');
            session()->flash('flash_message', 'successfully added ' );
            return redirect('articles');
//
//        Auth::user()->articles()->create($request->all());
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Something went wrong while creating you"re article, try again.');
            return back();
        }


    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }

    public function update($id, ArticleRequest $request)
    {

        try {
            $article = Article::findOrFail($id);
            $article->update($request->all());
            session()->flash('flash_message', 'successfully updated ' );
            return redirect('articles');
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Something went wrong while editing your article, try again.');
            return back();
        }
    }
//    public function up($id ,Request $request)
//    {
//
//        $article = Article::findOrFail($id);
//        $article->votes += 1;
//        $article->update($request->all());
//        return redirect()->back();
//    }

    public function deletearticle(Article $article)
    {
        session()->flash('flash_delete', 'Are you sure you want to delete this comment.');
        return view('articles.edit', compact('article'));
    }

    public function deletearticlecancel(article $article)
    {
        return redirect('articles/'.$article->id.'/edit');
    }

    public function deletearticleconfirm(Article $article)
    {
        try {
            if ($article->user_id == Auth::id()) {
                $article->delete();
                session()->flash('flash_message', 'successfully deleted ' . $article->title);
                return redirect('home');
            }
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Something went wrong while deleting your article, try again.');
            return redirect('articles.index');
        }
    }
//    public function down($id ,Request $request)
//    {
//        $article = Article::findOrFail($id);
//
//        $article->votes -= 1;
//        $article->update($request->all());
//        return redirect()->back();
//    }




        public function upvote(article $article, Request $request)
        {
            try {
                $article->increment('votes');
                \Session::flash('flash_message', 'successfully upvoted ' . $article->title . '.');
                $request->session()->flash('flash_message', 'Task was successful!');
                return back();
            } catch (\Exception $e) {
                \Session::flash('flash_error', 'Something went wrong while upvoting your article, try again.');
                return back();
            }
        }

        public  function downvote(article $article)
        {
            try {
                $article->decrement('votes');
                \Session::flash('flash_message', 'successfully downvoted ' . $article->title . '.');
                return back();
            } catch (\Exception $e) {
                \Session::flash('flash_error', 'Something went wrong while downvoting your article, try again.');
                return back();
            }
        }


//    public function deleteArticle($id)
//    {
//        $article = Article::findOrFail($id);
//        return view('edit-post', [
//            'post' => $post,
//            'delete' => 'true'
//        ]);
//    }
//    public function deleteConfirm(Request $request)
//    {
//        if (isset($request->cancel)) {
//            $article = Article::findOrFail($request->cancel);
//            return view('edit-post', [
//                'post' => $post,
//            ]);
//        } elseif (isset($request->delete)) {
//            $article = Article::findOrFail($request->delete);
//            $post->delete();
//            return redirect(url('/'))->with('success', 'Your post was deleted succesfully');
//        }
//    }

}
