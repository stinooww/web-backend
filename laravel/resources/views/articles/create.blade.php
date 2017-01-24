@extends('layouts.app')

@section('content')

<h1>Add article</h1>


{!!  Form::open(['url'=>'articles']) !!}



@include('articles.form',['SubmitBtnText'=>'Add Article'])
{!!  Form::close() !!}

@include('errors.list')
@stop