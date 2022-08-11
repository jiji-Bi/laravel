@section('header')
@include('drop-down')
<header class="max-w-xl mx-auto mt-10 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>

    <h2 class="inline-flex mt-2">By Lary Laracore <img src="/Laravel-From-Scratch-HTML-CSS/images/images/lary-head.svg"
                                                       alt="Head of Lary the mascot"></h2>


    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category -->
        {{-- <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
            
            @foreach($categories as $category)
                <option value="{{ $category->slug }}">{{ $category->name }} </option>
            @endforeach
        </select> --}}
        {{-- hiding the links with show:false --}}
         <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
           @yield('drop-down')
        </div> 

        <!-- Other Filters -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
            <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
                <option value="category" disabled selected>Other Filters
                </option>
                <option value="foo">Foo
                </option>
                <option value="bar">Bar
                </option>
            </select>
                @yield('icon-svg')
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                    <form method="GET" action="">
                        @if(request('category'))
                            <input type="hidden" name="category" placeholder="Find something"
                            class="bg-transparent placeholder-black font-semibold text-sm"
                            value={{ request('category') }}>
                        @endif
                        <input type="text" name="search" placeholder="Find something"
                               class="bg-transparent placeholder-black font-semibold text-sm"
                               value={{ request('search') }}>
                    </form>
        </div>
    </div>
</header>
@endsection