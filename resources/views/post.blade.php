@extends('layouts.blog-post')

@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : public_path().'placeholder.png'}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->content}}</p>

    <!-- Date/Time -->
    <p><i class="fas fa-history"></i> Posted {{$post->created_at ? $post->created_at->diffForHumans() : 'No date available'}}
        by <a href="">{{$post->user->name}}</a>
    </p>
    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    @if(Auth::user())
        <div class="well">
            @include('flash-message')

            <h4>Leave a Comment:</h4>
            {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store'])  !!}

            <div class="form-group">
                {!! Form::hidden('post_id', $post->id, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::textarea('body', null, ['placeholder'=>'Enter your comment...', 'class'=> "form-control {{ $errors->has('body') ? ' has-error' : '' }}", 'rows'=>3]) !!}

                @if ($errors->has('body'))
                    <span class="help-block">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>

        <hr>

        <!-- Posted Comments -->

        <!-- Comment -->
        <div class="well">
            <div class="media">
                @foreach($post->comments as $comment)
                    <br>
                    <a class="pull-left" href="#">
                        <img class="index-thumbnail" src="{{$comment->photo ? $comment->photo : '/images/placeholder.png'}}">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <small><a href="">{{$comment->author}}</a> posted {{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$comment->body}}
                        @if(Auth::user()->name == $comment->author)

                            <!-- Edit Button -->
                            <div class="pull-right">

                                <!-- Button trigger modal -->
                                <a href="" class="btn-sm btn-primary" data-toggle="modal" data-target="#myModal">
                                    Edit
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Edit comment</h4>
                                            </div>
                                            <div class="modal-body">

                                                    {!! Form::model($comment, ['method'=>'PUT', 'action'=>['PostCommentsController@edit', $comment->id]])  !!}

                                                    <div class="form-group">
                                                        {!! Form::hidden('post_id', $post->id, ['class'=>'form-control']) !!}
                                                    </div>

                                                    <div class="form-group">
                                                        {!! Form::textarea('body', null, ['class'=> "form-control {{ $errors->has('body') ? ' has-error' : '' }}", 'rows'=>3]) !!}

                                                        @if ($errors->has('body'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('body') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                {!! Form::submit('Save changes', ['type'=>'button', 'class'=>'btn btn-primary']) !!}
                                            </div>

                                            {!! Form::close() !!}

                                        </div>
                                    </div>
                                </div>

                            </div>

                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection

@section('categories')

    <!-- Blog Categories -->

    <ul class="list-group list-unstyled">
        <h4 class="list-group-item active">Blog Categories</h4>
        @if($categories)
            @foreach($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center"><a href="">{{$category->name}}</a>
                    <span class="badge badge-primary badge-pill">{{count($category->posts)}}</span>
                </li>
            @endforeach
        @endif
    </ul>


@endsection