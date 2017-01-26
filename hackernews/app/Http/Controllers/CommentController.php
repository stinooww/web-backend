<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use App\User;
use App\Article;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index']]);
    }
    /**
     * @return string
     */
    public function show($id){
        $article = Article::findOrFail($id);
        $comments = $article->comments;
//        return view('comments.show', compact('comment'));
        return view('comments.show', compact('article','comments'));
    }

//    public function store(CommentRequest $request)
//    {
//        Auth::user()->comments()->create($request->all());
//
//        return back();
//    }

    public function store(Article $article,CommentRequest $request)
    {
        $comment  = new Comments();
        $userid = Auth::id();
        $comment->user_id= $userid;
//        $comment->article_id->$request;
        $comment->body = request()->body;
        $article->comments()->save($comment);
        Auth::user()->comments()->create($request->all());
        return back();
    }

    public function deletecomment(Comments $comment,article $article)
    {
        $articleid=$comment->article_id;
        session()->flash('flash_delete','Are you sure you want to delete this comment.');
        return view('comments.show', compact('comment','article'));
    }
    public function cancelcom(Comments $comment){
        $articleid = $comment->article_id;
        return redirect('comments/'.$articleid);
    }
    public function deletecommentconfirm(Comments $comment)
    {
        try{
            $articleid = $comment->article_id;
            $comment->delete();
            session()->flash('flash_message','successfully deleted your comment.');
            return redirect('comments/'.$articleid);
        }
        catch (\Exception $e){
            session()->flash('flash_error', 'Something went wrong while deleting your comment, try again.');
            return back();
        }
    }

    public function edit(Comments $comment)
    {
        if($comment->user_id===Auth::id()){
            return view('comments.edit',compact('comment'));
        }
        else{
            return redirect()->route('login');
        }
    }
    public function update(Request $request, Comments $comment)
    {
        try{
            $comment->update($request->all());
            $article=$comment->article_id;
            session()->flash('flash_message','successfully edited your comment.');
            return view('comments.edit',compact('comment','article'));
        }
        catch (\Exception $e){
            session()->flash('flash_error', 'Something went wrong while editing your comment, try again.');
            return back();
        }
    }
    /**
     * @return string
     */
    public function back(Comments $comment)
    {
        $articleid = $comment->article_id;
        return redirect('/comments/'.$articleid);
    }
}