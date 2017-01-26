
@extends('layouts.app')
@section('content')
    <div class="breadcrumb">

        <a href="{{ url('/articles') }}">← back to overview</a>

    </div>


    <h2>{{ $article->title }}</h2>
    {{--@foreach($article->comments as $comment)--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-12">--}}
                {{--<p>{{$comment->body}}</p>--}}
                {{--<p><p>placed on {{$comment->updated_at}} | created by {{$comment->User->name}}--}}
                    {{--@if($comment->user_id === Auth::id())--}}
                        {{--<a href="/comments/{{$comment->id}}/edit"> <button type="submit" class="btn btn-primary btn-xs"> edit</button></a>--}}
                        {{--<a href="/comments/{{$comment->id}}/delete" class="btn btn-danger btn-xs ">delete</a>--}}
                    {{--@endif--}}

                {{--</p>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--@endforeach--}}
    <ul>
        @foreach($comments as $comment)
            <li>
                <div class="comment-body">{{ $comment->body }}</div>
                <div class="comment-info">
                    Posted by {{ App\User::find($comment->user_id)->name }} on {{ $comment->created_at }}
                    @if(App\User::find($comment->user_id) == Auth::user())
                        <a href="/comments/{{$comment->id}}/edit"> <button type="submit" class="btn btn-primary btn-xs"> edit</button></a>
                        {{--<a href="{{ url('comments/edit', $comment->id) }}"--}}
                           {{--class="btn btn-primary btn-xs edit-btn">edit</a>--}}
                        {{--<a href="/comments/{{$comment->id}}/delete"> <button type="submit" class="btn btn-danger btn-xs"> delete</button></a>--}}
                        <a href="{{ url('comments/delete', $comment->id) }}"
                           class="btn btn-danger btn-xs edit-btn">
                            <i class="fa fa-btn fa-trash" title="delete"></i> delete
                        </a>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>

    @if (Auth::user())
        @include('comments.create')
    @else
        <div>
            <p>You need to be <a href="{{ url('/login') }}">logged in</a> to comment</p>
        </div>


    @endif
    {{--@if (!Auth::guest())--}}

    {{--@else--}}
        {{--<p>You need to be <a href="/login">logged in</a> to comment</p>--}}
    {{--@endif--}}
@stop