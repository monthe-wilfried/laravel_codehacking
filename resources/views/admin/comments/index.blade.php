@extends('layouts.admin')

@section('styles')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('content')
    <h1>Comments</h1>
    <hr>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Body</th>
            <th scope="col">Photo</th>
            <th scope="col">Author</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        @if($comments)
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->body}}</td>
                    <td><img class="index-thumbnail" src="{{Auth::user()->gravatar}}" alt=""></td>
                    <td><a href="">{{$comment->author}}</a></td>
                    <td>{{$comment->email}}</td>
                    <td>
{{--                        approve/unapprove button--}}
                        @if($comment->is_active == 1)

                            {!! Form::open(['method'=>'PUT', 'action'=>['PostCommentsController@update', $comment->id]])  !!}

                            {!! Form::hidden('is_active', 0) !!}

{{--                            <div class="form-group">--}}
{{--                                <input type="checkbox" name="is_active" checked data-toggle="toggle">--}}
{{--                            </div>--}}

                            <div class="form-group">
                                    {!! Form::submit('On', ['class'=>'btn btn-success']) !!}
                            </div>


                            {!! Form::close() !!}

                            @else

                            {!! Form::open(['method'=>'PUT', 'action'=>['PostCommentsController@update', $comment->id]])  !!}

                            {!! Form::hidden('is_active', 1) !!}

{{--                            <div class="form-group">--}}
{{--                                <input type="checkbox" name="is_active" data-toggle="toggle">--}}
{{--                            </div>--}}

                            <div class="form-group">
                                {!! Form::submit('Off', ['class'=>'btn btn-warning']) !!}
                            </div>
                            {!! Form::close() !!}

                        @endif

                    </td>
                    <td>

                        {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}

                                    {!! Form::submit('Delete Comment', ['class'=>'btn btn-danger']) !!}

                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
@endsection


@section('scripts')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection