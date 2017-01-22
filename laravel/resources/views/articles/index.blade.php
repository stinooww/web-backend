@extends('app')

@section('content')


    @if(count($articles))
    <h1>    Articles</h1>

    <ul>
        @foreach($articles as $article)
             <article>
                    <h2>
                        <a href="{{action('ArticlesController@show',[$article->id])}}">{{$article->title}}</a>

                        {{--<a href="{{url('articles',$article->id)}}"></a>--}}
                    </h2>

                         <div class="body">
                             {{$article->body}}


                          </div>

             </article>
        @endforeach
    </ul>

    @endif

    @stop