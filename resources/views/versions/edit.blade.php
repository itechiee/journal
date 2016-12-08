@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- <div class="col-md-8 col-md-offset-2"> -->
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Version {{ $version->id }}</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($version, [
                            'method' => 'PATCH',
                            'url' => ['/versions', $version->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}


                        @include ('versions.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection