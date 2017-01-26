<h3>add a comment</h3>


<form action="/comments/{{$article->id}}"  method="POST">

    <div class="form-group">
        <textarea name="text" id="" cols="60" rows="5" ></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add comment</button>
    </div>
</form>

{{--{!!  Form::open(['url'=>'comments']) !!}--}}

{{--@include('comments.form',['SubmitBtnText'=>'add comment'])--}}


{{--{!!  Form::close() !!}--}}
{{--//action="/articles/{{$article->id}}/comments"--}}

@include('errors.list')