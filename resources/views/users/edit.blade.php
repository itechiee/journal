@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit User {{ $user->id }}</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($user, [
                            'method' => 'PATCH',
                            'url' => ['/users', $user->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                      <!--   @include ('users.form', ['submitButtonText' => 'Update']) -->

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('edit_password', null, ['class' => 'form-control']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    {!! Form::label('role', 'Role', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('role', ['admin', 'author', 'user'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
    {!! Form::label('active', 'Active', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
                    <div class="checkbox">
                <label>{!! Form::radio('active', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('active', '0', true) !!} No</label>
            </div>
        {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection