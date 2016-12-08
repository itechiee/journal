@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div >
                <div class="panel panel-default">
                    <div class="panel-heading">Years</div>
                    <div class="panel-body">

                        <a href="{{ url('/years/create') }}" class="btn btn-primary btn-xs" title="Add New Year"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Years </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($years as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->years }}</td>
                                        <td>
                                            <a href="{{ url('/years/' . $item->id) }}" class="btn btn-success btn-xs" title="View Year"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/years/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Year"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/years', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Year" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Year',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $years->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection