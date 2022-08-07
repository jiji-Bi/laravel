@section('drop-down')
@include('icon')
<div x-data="{show : false}" @click.outside="show = false">
    <button x-on:click="show= !show" class=" flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold" style="display:inline-flex">
        {{ isset($currentCategory) ? $currentCategory->name : 'categories'; }}
        
        @yield('icon-svg')
            
    </button>

    <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl  w-32 max-h-52 overflow-auto" style="display:none">
        <a href="/" class="block text-left px-3 text-xs leading-8 hover:bg-blue-300 focus:bg-blue-300  hover:text-white">All</a>
        @foreach ( $categories as $category)
         <a href="/categories/{{ $category->slug }}" 
            class="block text-left px-3 text-xs leading-8 hover:bg-blue-300 focus:bg-blue-300  hover:text-white                         
             {{ isset($currentCategory) &&  $currentCategory->id === $category->id ? 'bg-blue-500 text-white' : '' }}
             ">{{ $category->name }}</a>
        @endforeach
    </div>
 </div>
 @endsection