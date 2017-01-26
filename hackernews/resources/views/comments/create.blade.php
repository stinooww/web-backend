<h3>add a comment</h3>


{{--<form action="/comments/{{$article->id}}"  >--}}

  {{----}}
{{--</form>--}}

{!!  Form::open(['url'=>'comments']) !!}

{{--@include('comments.form',['SubmitBtnText'=>'add comment'])--}}
<div class="form-group">
    <label for="body" class="col-md-4 control-label">Comment</label>

    <div class="col-md-8">
        <textarea type="text" name="body" id="body" class="form-control"></textarea>
    </div>
</div>

<input type="hidden" name="article_id" value="2">

<!-- Add comment -->
<div class="form-group">
    <div class="col-md-offset-4 col-md-8">
        <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i> Add comment
        </button>
    </div>
</div>

{!!  Form::close() !!}
{{--//action="/articles/{{$article->id}}/comments"--}}

@include('errors.list')