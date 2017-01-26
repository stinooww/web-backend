@extends('layouts.app')

@section('content')

{!! Form::open(['url'=>'articles']) !!}
    <div class="breadcrumb">

        <a href="{{ url('/articles') }}">← back to overview</a>

    </div>
    <div class="form-group">
        {!! Form::label('title', 'Title (max. 255 characters',['class'=> 'col-md-4 control-label'])  !!}
        <div class="col-md-8">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    </div>
    <div class="form-group">
        {!! Form::label('url', 'URL',['class'=> 'col-md-4 control-label']) !!}
        <div class="col-md-8">
            {!! Form::text('url', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-4 col-md-8">
            <button type="submit" class="btn btn-default">
                <i class="fa fa-plus"></i> + Add Article
            </button>
        </div>
    </div>

{!! Form::close() !!}
@include('errors.list')
    @stop