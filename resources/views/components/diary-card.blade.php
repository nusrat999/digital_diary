@props(['diary'])

<x-card>
  <div class="flex">
    <img class="hidden w-48 mr-6 md:block"
      src="{{$diary->logo ? asset('storage/' . $diary->logo) : asset('/images/no-image.png')}}" alt="" />
    <div>
      <h3 class="text-2xl">
        <a href="/diaries/{{$diary->id}}">{{$diary->title}}</a>
      </h3>
      <p>{{$diary->description}}</p>
    </div>
  </div>
</x-card>
