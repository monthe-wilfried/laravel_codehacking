@extends('layouts.blog-home')

@section('content')
    @foreach($posts as $post)

        <div class="row">
            <div class="col-sm-12">
                <div class="thumbnail">
                    <img src="{{$post->photo ? $post->photo->file : $post->placeholder()}}" alt="...">
                    <div class="caption">
                        <h3><a href="{{route('home.post', $post->slug)}}">{{$post->title}}</a></h3>
                        <p>{!! str_limit($post->content, 150) !!}</p>
                        <a href="{{route('home.post', $post->slug)}}" class="btn btn-primary" role="button">Button</a>
                    </div>
                </div>
            </div>
        </div>

    @endforeach

    <!-- Pagination -->
    <ul class="pager">
        {{$posts->render()}}
    </ul>

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