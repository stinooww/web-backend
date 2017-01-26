@extends('layouts.app')

@section('content')

    <h1>Edit: {{ $comment->title }}</h1>

    {{--{!!  Form::model($comments,['method'=>'PATCH','action'=>['ArticlesController@update',$comments->id]]) !!}--}}

    {{--@include('$comments.form',['SubmitBtnText'=>'Update comments'])--}}


    {{--{!!  Form::close() !!}--}}
    <a href="/comments/{{$comment->id}}">back to overview</a>
    <form action="/comments/{{$comment->id}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group">
            <textarea name="text" id="" cols="60" rows="5" class="form-control">{{$comment->text}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">edit note</button>
        </div>
    </form>
    @include('errors.list')
@stop