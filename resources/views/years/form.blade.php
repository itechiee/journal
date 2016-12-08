<div class="form-group {{ $errors->has('years') ? 'has-error' : ''}}">
    {!! Form::label('years', 'Years', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('years', null, ['class' => 'form-control']) !!}
        {!! $errors->first('years', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>