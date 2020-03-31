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
            <th scope="col">Author</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($comments)
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a href="">{{$comment->author}}</a></td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->is_active}}</td>
                    <td>
{{--                        approve/unapprove button--}}
                        @if($comment->is_active == 1)

                            {!! Form::open(['method'=>'PUT', 'action'=>['PostCommentsController@update', $comment->id]])  !!}

{{--                            {!! Form::hidden('is_active', 0) !!}--}}

                            <div class="form-group">
                                <input type="checkbox" name="is_active" checked data-toggle="toggle">
                            </div>

                            {!! Form::close() !!}

                            @else

                            {!! Form::open(['method'=>'PUT', 'action'=>['PostCommentsController@update', $comment->id]])  !!}

{{--                            {!! Form::hidden('is_active', 1) !!}--}}

                            <div class="form-group">
                                <input type="checkbox" name="is_active" data-toggle="toggle">
                            </div>

                            {!! Form::close() !!}

                        @endif

                    </td>
                    <td>{{$comment->created_at->diffForhumans()}}</td>
                    <td>{{$comment->updated_at->diffForhumans()}}</td>
                    <td><a href="{{route('home.post', $comment->post->id)}}">View Post</a></td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
@endsection


@section('scripts')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection