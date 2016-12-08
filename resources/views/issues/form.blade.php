
<div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
    {!! Form::label('year', 'Year', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('year_id', $yearlist, null, ['class' => 'form-control']) !!}
        {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('issues') ? 'has-error' : ''}}">
    {!! Form::label('issues', 'Issues', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('issues', null, ['class' => 'form-control']) !!}
        {!! $errors->first('issues', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>