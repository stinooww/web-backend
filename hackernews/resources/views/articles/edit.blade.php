@extends('layouts.app')

@section('content')
    @if(Session::has('flash_delete'))
        <div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span><em> {!! session('flash_delete') !!}</em><a href="/articles/{{$article->id}}/deleteconf" class="btn btn-danger btn-xs">confirm delete</a><a href="/articles/{{$article->id}}/cancel" class="btn btn-xs">cancel</a></div>
    @endif
    <h1>Edit: {{ $article->title }}</h1>
    <div class="breadcrumb">

        <a href="{{ url('/articles') }}">← back to overview</a>

    </div>
    <a href="/articles/{{$article->id}}/delete" class="btn btn-danger btn-xs">delete article</a>
    {!!  Form::model($article,['method'=>'PATCH','action'=>['ArticleController@update',$article->id]]) !!}


    <div class="form-group">
        {!!  Form::label('title','Title:') !!}

        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!!  Form::label('url','URL:') !!}

        {!! Form::textarea('url',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update Article',['class'=>'btn btn-primary form-control']) !!}
    </div>

    {!!  Form::close() !!}

    @include('errors.list')
@stop