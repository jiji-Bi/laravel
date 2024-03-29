@section('card')

 <article class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl {{ $ChangeCol }}">{{--style="background-color:{{ $color }}"> --}}
<div class="py-6 px-4 h-full flex flex-col">
    <div>
        <img src="/Laravel-From-Scratch-HTML-CSS/images/images/illustration-5.png" alt="Blog Post illustration" class="rounded-xl">
    </div>

    <div class="mt-6 flex flex-col justify-between flex-1">
        <header>
            <div class="space-x-2">
                <a href="/?category={{ $post->category->slug }}"
                   class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                   style="font-size: 10px">{{  $post->category->name }}</a>
            </div>

            <div class="mt-4">
                <h1 class="text-3xl">
                    <a href="/?category={{ $post->category->slug }}">
                        {{ $post->title }} </a>
                </h1>

                <span class="mt-2 block text-gray-400 text-xs">
                    Published <time>{{ $post->created_at->diffForHumans() }}</time>
                </span>
            </div>
        </header>
        <div class="text-sm mt-4">
            <p>
                {!! $post->excerpt !!}
            </p>
        

        </div>

        <footer class="inline-flex justify-between items-center mt-8 ">
            <div class="inline-flex items-center text-sm  ">
                <img src="/Laravel-From-Scratch-HTML-CSS/images/images/lary-avatar.svg" style="" alt="Lary avatar">
                <div class="ml-3">
                    <a href="/?author={{ $post->author->name }}">
                       {{ $post->author->name }}
                    </a>
               </div>
            </div>
            <div>
                <a href="/posts/{{ $post->slug }}"
                   class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">
                   Read More
                </a>
            </div>
         
        </footer>
    </div>
</div>
</article>
@overwrite