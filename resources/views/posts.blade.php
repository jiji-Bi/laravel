{{--
@section('banner')
<h1>My blog </h1>
@endsection

@section('content')
        @foreach ($posts as $post)
        <article class="{{ $loop->even?'even':'odd' }}">
          <h1>
            <a href="/posts/{{  $post->slug }}">
             {!! $post->title  !!}
            </a>
          </h1> 
            <p>  By <a href="/authors/{{ $post->author->name }}">{{ $post->author->name }}</a> </a>  in <a href="/categories/{{ $post->category->slug }}">
              {!!$post->category->name  !!}
            </a>
          </p>
          <div>
           {!!  $post->body !!}
          </div> 

        </article>
        @endforeach
 --}}
 @extends('layout')
 @section('content')
 @include('header')
 @include('post-grid')
 <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
@yield('header')
    {{-- having at least one single post --}}
    @if($posts->count())
        @include('featured-post-card', ['post' => $posts[0]] )
        @yield('featured')
        @yield('grid')
        {{ $posts->links() }}
        @else
        <p class="text-center"> No posts to display for now, come back later </p>
    @endif    
</main>

 @endsection




