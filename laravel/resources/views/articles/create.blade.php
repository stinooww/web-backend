@extends('app');

@section('content')

<h1>Write a new article</h1>

{!!  Form::open() !!}

<div class="form-group">
    {!! ! Form::label('name','Name:') !!}

    {!! ! Form::text('name',null,['class'=>'form-control']) !!}
</div>
{!!  Form::close() !!}
@stop