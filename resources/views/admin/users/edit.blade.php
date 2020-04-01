@extends('layouts.admin')

@section('content')
    <h1>Edit Users</h1>
    <hr>

    <div class="col-sm-3">
        <img src="{{$user->photo ? $user->photo->file : $user->placeholder()}}" alt="" class="img-responsive img-rounded">
    </div>

    <div class="col-sm-9">

        {!! Form::model($user, ['method'=>'PUT', 'action'=>['AdminUsersController@update', $user->id], 'files'=>'true'])  !!}

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
            {!! Form::select('is_active', [1 => 'Active', 0 => 'Not Active'], null, ['class'=> "form-control"]) !!}
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
            {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-2']) !!}
        </div>

        {!! Form::close() !!}


        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

        <div class="form-group">
            {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-2']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection