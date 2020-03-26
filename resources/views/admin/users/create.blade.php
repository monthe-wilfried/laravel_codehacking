@extends('layouts.admin')

@section('content')
    <h1>Create Users</h1>
    <hr>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>'true'])  !!}

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
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class'=> "form-control {{ $errors->has('email') ? ' has-error' : '' }}"]) !!}

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id', [''=>'Select a role...'] + $roles, null, ['class'=> "form-control {{ $errors->has('role_id') ? ' has-error' : '' }}"]) !!}

        @if ($errors->has('role_id'))
            <span class="help-block">
                <strong>{{ $errors->first('role_id') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active', [1 => 'Active', 0 => 'Not Active'], 0, ['class'=> "form-control"]) !!}
    </div>

    <div class="form-group">
         {!! Form::label('photo_id', 'Upload your picture:') !!}
         {!! Form::file('photo_id', ['class'=>'form-control']) !!}
    </div>
    <hr>

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class'=> "form-control {{ $errors->has('password') ? ' has-error' : '' }}"]) !!}

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation', 'Confirm Password:') !!}
        {!! Form::password('password_confirmation', ['class'=> "form-control {{ $errors->has('password_confirmation') ? ' has-error' : '' }}"]) !!}

        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}

@endsection