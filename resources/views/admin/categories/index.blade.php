@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>
    <hr>

    <div class="col-sm-3">
        <div class="add-category">
            <a class="btn btn-primary btn-add" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i class="fa fa-plus"></i> Add Category
            </a>

            <div class="collapse" id="collapseExample">
                <div class="card card-body">


                    {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store'])  !!}

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
                        {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
                    </div>


                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-9">
      <table class="table table-striped">
        <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Created</th>
          <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>

        @foreach($categories as $category)

          <tr>
            <th>{{$category->id}}</th>
            <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
            <td>{{$category->created_at->diffForhumans()}}</td>
            <td>{{$category->updated_at->diffForhumans()}}</td>
          </tr>

        @endforeach
        </tbody>
      </table>
    </div>

@endsection