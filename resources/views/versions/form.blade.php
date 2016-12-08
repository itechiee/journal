<div class="form-group {{ $errors->has('year_id') ? 'has-error' : ''}}">
    {!! Form::label('year', 'Year', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('year_id', [null=>'Please Select'] + $yearlist, $yearId, ['class' => 'form-control', 'id' => 'select_year']) !!}
        {!! $errors->first('year_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('issue_id') ? 'has-error' : ''}}">
    {!! Form::label('Issue', 'Issue', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('issue_id', ['' => 'Please Select'] + $issuelist, $issueId, ['class' => 'form-control', 'id' => 'select_issues']) !!}
        {!! $errors->first('issue_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('file_path') ? 'has-error' : ''}}">
    {!! Form::label('file_path', 'File Path', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('file_path', null, ['class' => 'form-control']) !!}
        {!! $errors->first('file_path', '<p class="help-block">:message</p>') !!}
        <small><b>Note: File must be pdf, doc, docx </b></small>
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>