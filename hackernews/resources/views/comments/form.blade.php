<div class="form-group">
    {!!  Form::label('body','Body:') !!}

    {!! Form::textarea('body',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($SubmitBtnText,['class'=>'btn btn-primary form-control']) !!}
</div>