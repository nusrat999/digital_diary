<x-layout>
    @if (!Auth::check())
      @include('partials._hero')
    @endif
  
    @include('partials._search')
  
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
  
      @unless(count($diaries) == 0)
  
      @foreach($diaries as $diary)
      <x-diary-card :diary="$diary" />
      @endforeach
  
      @else
      <p>No diaries available</p>
      @endunless
  
    </div>
  
    <div class="mt-6 p-4">
      {{$diaries->links()}}
    </div>
  </x-layout>