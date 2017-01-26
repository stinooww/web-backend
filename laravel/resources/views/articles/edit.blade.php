@extends('layouts.app')

@section('content')

<h1>Edit: {{ $article->title }}</h1>
<div class="breadcrumb">

    <a href="{{ url('/articles') }}">← back to overview</a>

</div>
{!!  Form::model($article,['method'=>'PATCH','action'=>['ArticlesController@update',$article->id]]) !!}
@include('articles.form',['SubmitBtnText'=>'Update Article'])


{!!  Form::close() !!}

@include('errors.list')
@stop