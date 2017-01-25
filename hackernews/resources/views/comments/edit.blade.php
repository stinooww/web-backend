@extends('layouts.app')

@section('content')

    <h1>Edit: {{ $comments->title }}</h1>

    {!!  Form::model($comments,['method'=>'PATCH','action'=>['ArticlesController@update',$comments->id]]) !!}
    @include('$comments.form',['SubmitBtnText'=>'Update $comments'])


    {!!  Form::close() !!}

    @include('errors.list')
@stop