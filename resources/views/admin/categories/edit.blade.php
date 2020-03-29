@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>
    <hr>

    {!! Form::model($category, ['method'=>'PUT', 'action'=>['AdminCategoriesController@update', $category->id]])  !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=> "form-control {{ $errors->has('name') ? ' has-error' : '' }}"]) !!}

        @if ($errors->has('name'))
            <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit('Update Category', ['class'=>'btn btn-primary col-sm-2']) !!}
    </div>

    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}

    <div class="form-group">
        {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-2']) !!}
    </div>

    {!! Form::close() !!}
@endsection