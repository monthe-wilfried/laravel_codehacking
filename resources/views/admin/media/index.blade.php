@extends('layouts.admin')

@section('content')

    <h1>Media</h1>
    <hr>

    @if($photos)

        <form action="/dele" method="post"></form>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Created</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <th>{{$photo->id}}</th>
                    <td><img height="50" width="50" src="{{$photo->file}}" class="img-thumbnail"></td>
                    <td>{{$photo->file}}</td>
                    <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No date'}}</td>
                    <th>

                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediaController@destroy', $photo->id]]) !!}

                                <div class="form-group">
                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                </div>

                        {!! Form::close() !!}

                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endif

@endsection