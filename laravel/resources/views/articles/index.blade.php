
@extends('layouts.app')
@section('content')


    @if(count($article))
  <div class="panel-heading">
      Articles overview

  </div>
<div class="panel-content">
    <ul>
        @foreach($article as $articles)
             <article>
                    <h2>
                        <a href="{{action('ArticlesController@show',[$articles->id])}}">{{$articles->title}}</a>

                        {{--<a href="{{url('articles',$article->id)}}"></a>--}}
                    </h2>

                         <div class="body">
                             {{$articles->body}}


                          </div>

             </article>
        @endforeach
    </ul>

</div>
    @endif

    @stop