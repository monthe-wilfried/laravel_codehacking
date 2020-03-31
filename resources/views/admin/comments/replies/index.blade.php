@extends('layouts.admin')


@section('content')
    <h1>Replies</h1>
    <hr>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Body</th>
            <th scope="col">Author</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        @if($replies)
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="">{{$reply->author}}</a></td>
                    <td>{{$reply->email}}</td>
{{--                    <td>--}}
{{--                        --}}{{--                        approve/unapprove button--}}
{{--                        @if($comment->is_active == 1)--}}

{{--                            {!! Form::open(['method'=>'PUT', 'action'=>['PostCommentsController@update', $comment->id]])  !!}--}}

{{--                            {!! Form::hidden('is_active', 0) !!}--}}

{{--                            --}}{{--                            <div class="form-group">--}}
{{--                            --}}{{--                                <input type="checkbox" name="is_active" checked data-toggle="toggle">--}}
{{--                            --}}{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                {!! Form::submit('On', ['class'=>'btn btn-success']) !!}--}}
{{--                            </div>--}}


{{--                            {!! Form::close() !!}--}}

{{--                        @else--}}

{{--                            {!! Form::open(['method'=>'PUT', 'action'=>['PostCommentsController@update', $comment->id]])  !!}--}}

{{--                            {!! Form::hidden('is_active', 1) !!}--}}

{{--                            --}}{{--                            <div class="form-group">--}}
{{--                            --}}{{--                                <input type="checkbox" name="is_active" data-toggle="toggle">--}}
{{--                            --}}{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                {!! Form::submit('Off', ['class'=>'btn btn-warning']) !!}--}}
{{--                            </div>--}}
{{--                            {!! Form::close() !!}--}}

{{--                        @endif--}}

{{--                    </td>--}}
                    <td>

                        {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentRepliesController@destroy', $reply->id]]) !!}

                        {!! Form::submit('Delete Reply', ['class'=>'btn btn-danger']) !!}

                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
@endsection


