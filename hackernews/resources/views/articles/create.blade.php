@extends('layouts.app')

@section('content')

{!! Form::open() !!}
<div class="breadcrumb">

    <a href="/articles.index">← back to overview</a>

</div>
<div class="form-group">
    {!! Form::label('title', 'Title (max. 255 characters')  !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('link', 'URL') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">

    <button type="submit" class="btn btn-default">
        <i class="fa fa-plus"></i> Add Article
    </button>

</div>

{!! Form::close() !!}

    @stop