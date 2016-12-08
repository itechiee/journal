@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Issues</div>
                    <div class="panel-body">

                        <a href="{{ url('/issues/create') }}" class="btn btn-primary btn-xs" title="Add New Issue"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Issues </th><th> Year </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($issues as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->issues }}</td><td>{{ $item->year }}</td>
                                        <td>
                                            <a href="{{ url('/issues/' . $item->id) }}" class="btn btn-success btn-xs" title="View Issue"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/issues/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Issue"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/issues', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Issue" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Issue',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $issues->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection