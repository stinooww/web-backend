<!-- form here -->

<div class="form-group">
    {!! Form::label('body', 'Comment', ['class' => 'col-md-2 control-label']) !!}

    {!! Form::textarea('body', null, ['class' => 'col-md-2 form-control ']) !!}

</div>
<div class="form-group">
    {!! Form::submit($SubmitBtnText, ['class' => 'btn btn-default']) !!}
</div>
{{--<input name="post_id" value="{{$post->id}}" type="hidden">--}}
