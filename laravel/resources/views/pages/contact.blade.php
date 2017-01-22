@extends('app')

@section('content')


    {{--@if($first == "stijn")--}}
        {{--<h1> contact me!</h1>--}}



    {{--@else--}}
    {{--<h1>jooooo</h1>--}}

    {{--@endif--}}

    {{----}}
    {{--checken als onze array list leeg is ofni--}}

@if(count($people))
    <h3>People i like</h3>
<ul>
    @foreach($people as $person)
    <li>{{$person}}</li>

    @endforeach
</ul>
    @endif
@stop



@section('footer')

    <script>
        console.log('hejkes');
    </script>

    @stop

