@extends('layout')
@section('content')

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto">
            <form method="POST" action="/register">
                @csrf
                  <div class="mb-6">
                      <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                             for="">
                          {{ __('') }}
                      </label>
                      <input class="w-full p-2 border border-gray-400 rounded"
                             type="text"
                             id=""
                             name=""
                             value=""
                             required>
                  </div>
            </form>
        </main>
        </section>
</body>
@endsection 
