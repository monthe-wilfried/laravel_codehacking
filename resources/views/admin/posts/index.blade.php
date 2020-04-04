@extends('layouts.admin')

@section('content')
    <h1>List of Posts</h1>
    <hr>

    <table class="table table-striped">
      <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Owner</th>
            <th scope="col">Category</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->user->name}}</td>
                    <td>
                        @foreach($post->categories as $category)
                            {{$category->name ? $category->name : 'Uncategorized'}}
{{--                            @if(count($post->categories)>1)--}}
{{--                                {{'|'}}--}}
{{--                            @endif--}}
                        @endforeach
                    </td>
                  <td>{{$post->created_at->diffForhumans()}}</td>
                    <td>{{$post->updated_at->diffForhumans()}}</td>
                    <td>
                        <a class="btn btn-default" href="{{route('home.post', $post->slug)}}">View Post</a>
                    </td>
                    <td>
                        <a class="btn btn-default" href="{{route('admin.comments.show', $post->id)}}">View Comments</a>
                    </td>
                </tr>
            @endforeach
        @endif

      </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
{{--            {{$posts->links()}}--}}
            {{$posts->render()}}
        </div>
    </div>

@endsection