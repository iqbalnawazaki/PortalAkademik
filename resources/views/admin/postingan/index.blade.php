@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Postingan</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/postingan/create') }}" class="btn btn-rounded btn-success" title="Add New Postingan">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>No</th><th>Judul</th><th>Waktu</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($postingan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->judul }}</td><td>{{ $item->waktu }}</td>
                                        <td>
                                            <a href="{{ url('/admin/postingan/' . $item->id) }}" title="View Postingan"><button class="btn btn-rounded btn-info"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/postingan/' . $item->id . '/edit') }}" title="Edit Postingan"><button class="btn btn-rounded btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/postingan', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-rounded btn-danger',
                                                        'title' => 'Delete Postingan',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
