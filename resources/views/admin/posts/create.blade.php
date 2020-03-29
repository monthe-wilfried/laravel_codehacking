@extends('layouts.admin')

@section('content')
    <h1>Create Posts</h1>
    <hr>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>'true'])  !!}


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
        {!! Form::select('category_id', [''=>'Select a category...'] + $categories, null, ['class'=> "form-control {{ $errors->has('category_id') ? ' has-error' : '' }}"]) !!}

        @if ($errors->has('category_id'))
            <span class="help-block">
                    <strong>{{ $errors->first('category_id') }}</strong>
                </span>
        @endif
    </div>


    <div class="form-group">
        {!! Form::label('path', 'Upload picture:') !!}
        {!! Form::file('path', ['class'=> "form-control"]) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>



    {!! Form::close() !!}
@endsection