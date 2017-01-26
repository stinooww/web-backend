@extends('layouts.app')

@section('content')

    <h1>Edit: {{ $comment->body }}</h1>

    {{--{!!  Form::model($comments,['method'=>'PATCH','action'=>['ArticlesController@update',$comments->id]]) !!}--}}

    {{--@include('$comments.form',['SubmitBtnText'=>'Update comments'])--}}


    {{--{!!  Form::close() !!}--}}
    <a href="/comments/{{$comment->id}}">back to overview</a>
    <a href="/comments/{{$comment->id}}/delete" class="btn btn-danger btn-xs pull-right">
        <i class="fa fa-btn fa-trash" title="delete"></i> delete comment
    </a>

    {{--<form action="/comments/{{$comment->id}}" method="POST">--}}
        {{--{{ csrf_field() }}--}}
        {{--{{ method_field('PATCH') }}--}}
        {{--<div class="form-group">--}}
            {{--<textarea name="text" id="" cols="60" rows="5" class="form-control">{{$comment->body}}</textarea>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<button type="submit" class="btn btn-primary">edit note</button>--}}
        {{--</div>--}}
    {{--</form>--}}



    {!!  Form::model($comment,['method'=>'PATCH','action'=>['CommentController@update',$comment->id]]) !!}


    <div class="form-group">
        {!!  Form::label('body','Comment:') !!}

        {!! Form::text('body',null,['class'=>'form-control']) !!}
    </div>



    <div class="form-group">
        {!! Form::submit('Update Comment',['class'=>'btn btn-primary form-control']) !!}
    </div>

    {!!  Form::close() !!}
    @include('errors.list')
@stop