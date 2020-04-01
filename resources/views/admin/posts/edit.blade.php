@extends('layouts.admin')

@section('content')
    <h1>Edit Post</h1>
    <hr>

    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>'true'])  !!}

    <div class="col-sm-3">
        <img src="{{$post->photo ? $post->photo->file : $post->placeholder()}}" class="img-responsive img-thumbnail">
    </div>

    <div class="col-sm-9">
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=> "form-control {{ $errors->has('title') ? ' has-error' : '' }}", 'placeholder'=>'Enter title']) !!}

            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('content', 'Content:') !!}
            {!! Form::textarea('content', null, ['class'=> "form-control {{ $errors->has('content') ? ' has-error' : '' }}", 'placeholder'=>'Enter your post content here...']) !!}

            @if ($errors->has('content'))
                <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>


        <div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id', $categories, $post->categories, ['class'=> "form-control {{ $errors->has('category_id') ? ' has-error' : '' }}"]) !!}

            @if ($errors->has('category_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('category_id') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('path', 'Upload picture:') !!}
            {!! Form::file('path', null, ['class'=> "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-2']) !!}
        </div>
        {!! Form::close() !!}



        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}

        <div class="form-group">
            {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-2']) !!}
        </div>

        {!! Form::close() !!}

    </div>












@endsection