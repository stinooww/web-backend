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

    public function store(CommentRequest $request)
    {
        try{
            Auth::user()->comments()->create($request->all());

//            $comment  = new Comments();
//            $userid = Auth::id();
//            $comment->user_id= $userid;
//            // $article=$comment->article_id;
////        $comment->article_id->$request;
//            $comment->body = request()->body;
//            $article->comments()->save($comment);

            session()->flash('flash_message', 'successfully added ' );
            return back();
        } catch (Exception $e) {
            session()->flash('flash_error', 'Something went wrong while creating you"re comment, try again.');
            return back();
        }

    }

//public function deletePage($id, Request $request)
//{
//    $comment = Comments::findOrFail($id);
//    $referer = $request->server('HTTP_REFERER');
//
//    if ($referer == url('/comments', $comment->post_id)) {
//        return redirect(url('/comments', $comment->post_id))->with('delete', 'delete')->with('comment_id', $id);
//    } elseif ($referer == url('/comments/edit', $comment->id)) {
//        return redirect(url('/comments/edit', $comment->id))->with('delete', 'delete');
//    } else {
//        return redirect(url('/'));
//    }
//}
//    public function delete(Request $request)
//    {
//        if (isset($request->cancel)) {
//            $comment = Comments::findOrFail($request->cancel);
//            if ($request->from == 'overview') {
//                $comment = Comments::findOrFail($request->cancel);
//                $post = Post::findOrFail($comment->post_id);
//                return redirect(url('/comments', $post->id));
//            } elseif ($request->from == 'edit') {
//                return redirect(url('/comments/edit', $comment->id));
//            }
//        } elseif (isset($request->delete)) {
//            $comment = Comments::findOrFail($request->delete);
//            $post = Post::findOrFail($comment->post_id);
//            $comment->delete();
//            return redirect(url('/comments', $post->id))->with('success', 'Your comment was deleted succesfully');
//        }
//    }
    public function deleteComment(Comments $comment,article $article,$id)
    {
        $comment = Comments::findOrFail($id);
        $articleid=$comment->article_id;
        session()->flash('flash_delete','Are you sure you want to delete this comment.');
        return view('comments.show', compact('comment','article'));
    }
    public function cancelComment(Comments $comment){
        $id = $comment->article_id;
        return redirect('comments/'.$id);
    }


    public function delete(Comments $comment)
    {
        try{
            $articleID = $comment->article_id;
            $comment->delete();
            session()->flash('flash_message','successfully deleted your comment.');
            return redirect('comments/'.$articleID);
        }
        catch (\Exception $e){
            session()->flash('flash_error', 'Something went wrong while deleting your comment, try again.');
            return back();
        }
    }

//    public function edit(Comments $comment)
//    {
//        if($comment->user_id===Auth::id()){
//            return view('comments.edit',compact('comment'));
//        }
//        else{
//            return redirect()->route('login');
//        }
//    }
    public function edit($id){
        $comment = Comments::findOrFail($id);

        return view('comments.edit',compact('comment'));
    }

    public function update($id, CommentRequest $request){
        try{
        $comment = Comments::findOrFail($id);
        $comment->update($request->all());
            session()->flash('flash_message', 'successfully updated ' );
        return redirect('comments/'.$id);
        }
        catch (\Exception $e){
            session()->flash('flash_error', 'Something went wrong while editing your comment, try again.');
            return back();
        }
    }


    public function back(Comments $comment)
    {
        $id = $comment->article_id;
        return redirect('/comments/'.$id);
    }
}