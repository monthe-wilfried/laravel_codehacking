@extends('layouts.admin')

@section('content')
    <h1>List of Posts</h1>
    <hr>

    <table class="table table-striped">
      <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Owner</th>
            <th scope="col">Category</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
      </thead>
      <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('home.post', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{str_limit($post->content, 100)}}</td>
                    <td><a href="{{route('posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                    <td>
                        @foreach($post->categories as $category)
                            <a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a>
{{--                            @if(count($post->categories)>1)--}}
{{--                                {{'|'}}--}}
{{--                            @endif--}}
                        @endforeach
                    </td>
                  <td>{{$post->created_at->diffForhumans()}}</td>
                    <td>{{$post->updated_at->diffForhumans()}}</td>
                </tr>
            @endforeach
        @endif

      </tbody>
    </table>
@endsection