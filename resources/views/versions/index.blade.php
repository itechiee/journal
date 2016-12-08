@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">Versions</div>
                    <div class="panel-body">

                        <a href="{{ url('/versions/create') }}" class="btn btn-primary btn-xs" title="Add New Version"><span class="glyphicon glyphicon-plus" aria-hidden="true"/> Add New Version</a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Title </th><th> Description </th><th> File Path </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($versions as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td><td>{{ $item->description }}</td><td>{{ $item->file_path }}</td>
                                        <td>
                                            <a href="{{ url('/versions/' . $item->id) }}" class="btn btn-success btn-xs" title="View Version"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/versions/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Version"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/versions', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Version" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Version',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $versions->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection