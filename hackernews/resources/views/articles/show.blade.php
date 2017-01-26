@extends('layouts.app')

@section('content')
    <div class="breadcrumb">

        <a href="{{ url('/articles') }}">← back to overview</a>

    </div>
    <div class="panel-heading">
        Articles:   {{$article->title}}
    </div>

    <div class="panel-content">

        {{$article ->body}}

        @if (Auth::guest())
            <li>You need to be <a href="{{ url('/login') }}">logged in</a> to comment</li>

        @else
    </div>

@stop