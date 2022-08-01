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
 @include('post-card')
 @include('featured-post-card')

 @section('content')
 <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

    @yield('featured')
    @yield('featured')
    @yield('featured')

    <div class="lg:grid lg:grid-cols-2">
        @yield('card')
        @yield('card')
    </div>

    <div class="lg:grid lg:grid-cols-3">

        @yield('card')
        @yield('card')
        @yield('card')

    </div>
</main>

 @endsection




