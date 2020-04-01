@extends('layouts.blog-post')

@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : $post->placeholder()}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{!! $post->content !!}</p>


    <!-- Disqus comment plugin -->

    <div id="disqus_thread"></div>
    <script>

        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://codehacking-be6an3ihij.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>



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