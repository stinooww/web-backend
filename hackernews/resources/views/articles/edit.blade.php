@extends('layouts.app')

@section('content')

    <h1>Edit: {{ $article->title }}</h1>
    <div class="breadcrumb">

        <a href="{{ url('/articles') }}">← back to overview</a>

    </div>
    {!!  Form::model($article,['method'=>'PATCH','action'=>['ArticleController@update',$article->id]]) !!}


    <div class="form-group">
        {!!  Form::label('title','Title:') !!}

        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!!  Form::label('url','URL:') !!}

        {!! Form::textarea('URL',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update Article',['class'=>'btn btn-primary form-control']) !!}
    </div>

    {!!  Form::close() !!}

    @include('errors.list')
@stop