@if($errors->any())
    <ul class="alert alert-danger ">

        <br><br><br><br>
        @foreach($errors->all() as $error)

            <li>    {{$error}}</li>

        @endforeach

    </ul>
@endif