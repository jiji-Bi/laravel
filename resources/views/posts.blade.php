@extends('layout')

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
@endsection
