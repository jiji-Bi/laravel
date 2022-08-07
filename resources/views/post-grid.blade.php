@section('grid')
@if($posts->count()>1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($posts->skip(1) as $post)
            @include('post-card',['post'=> $post,'ChangeCol'=> $loop->iteration < 3 ? 'col-span-3':'col-span-2'])
            @yield('card')
        @endforeach
    </div>
@endif 
@endsection