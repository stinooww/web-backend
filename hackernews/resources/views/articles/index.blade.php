
@extends('layouts.app')
@section('content')



        <div class="panel-heading">            Articles overview        </div>
        <div class="panel-body">
            @foreach($articles as $article)
                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-lg-1">
                            <div class="vote">
                                <form action="/articles/{{$article->id}}/up" method="POST">
                                    {{csrf_field()}}
                                    {{ method_field('PATCH') }}
                                    @if(Auth::user())
                                        <button >
                                            <i class="glyphicon glyphicon-chevron-up" title="upvote"></i>
                                        </button>
                                    @else
                                        <i class="glyphicon glyphicon-chevron-up" title="you need to be logged in to vote"></i>
                                    @endif
                                </form>
                                <form action="/articles/{{$article->id}}/down" method="POST">
                                    {{csrf_field()}}
                                    {{ method_field('PATCH') }}
                                    @if(Auth::user())
                                        <button>
                                            <i class="glyphicon glyphicon-chevron-down" title="downvote"></i>
                                        </button>
                                    @else
                                        <i class="glyphicon glyphicon-chevron-down" title="you need to be logged in to vote"></i>
                                    @endif
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-10">
                            <h3><a href="{{$article->url}}">{{$article->title}}</a></h3>
                            <p>{{$article->votes}} points | placed on {{$article->updated_at}}| created by <span>{{$article->User->name}}</span>  |
                                @if($article->comments->count()==1)
                                    {{--<a href="{{action('CommentController@show',[$article->id])}}">{{$article->comments->count()}} comment</a>--}}
                                    <a href="/comments/{{$article->id}}">{{$article->comments->count()}} comment</a>
                                @else
                                    <a href="/comments/{{$article->id}}">{{$article->comments->count()}} comments</a>
                                @endif
                                @if(Auth::id()===$article->user_id)
                                    <a href="/articles/{{$article->id}}/edit"><button type="submit" class="btn btn-primary btn-xs">edit</button></a>
                                @endif
                            </p>
                        </div>
                    </div>

                </div>
            @endforeach
            {{--<ul>--}}
                {{--@foreach($articles as $article)--}}
                    {{--<div>--}}
                        {{--<span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>--}}
                        {{--<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>--}}
                    {{--</div>--}}
                    {{--<article>--}}
                        {{--<h2>--}}
                            {{--<a href="{{action('CommentController@show',[$article->id])}}">{{$article->title}}</a>--}}

                            {{--<a href="{{url('articles',$article->id)}}"></a>--}}
                        {{--</h2>--}}



                    {{--</article>--}}


                    {{--<li>--}}
                        {{--<div class="vote">--}}
                            {{--<div class="form-inline upvote">--}}
                                {{--<i class="fa fa-btn fa-caret-up upvote" title="You need to be logged in to upvote"></i>--}}
                            {{--</div>--}}

                            {{--<div class="form-inline upvote">--}}
                                {{--<i class="fa fa-btn fa-c uet-down downvote" title="You need to be logged in to downvote"></i>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        {{--<div class="url">--}}
                            {{--<a href="{{$article->url}}" class="urlTitle">{{ $article->title }}</a>--}}
                            {{--@if (Auth::user())--}}
                                {{--@if (Auth::user()->name == $article->name)--}}
                                    {{--<a href="/Hackernews/public/article/edit/{{$article->id}}" class="btn btn-primary btn-xs edit-btn">edit</a>--}}
                                {{--@endif--}}
                            {{--@endif--}}
                        {{--</div>--}}

                        {{--<div class="info">--}}
                            {{--@unless($article->votes == 1 )--}}
                                {{--{{ $article->votes }} points  | posted by {{ $article->name }} | <a href="comments/{{$article->id}}">{{ $article->votes}} comments </a>--}}
                                {{--@else--}}
                                    {{--{{ $article->votes }} points  | posted by {{ $article->name }} | <a href="comments/{{$article->id}}">{{ $article->votes}} comment </a>--}}

                                    {{--@endunless--}}


                        {{--</div>--}}
                    {{--</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}

        </div>


@stop