@props(['active' => false])

<a class="{{$active ? "text-orange-600 border-b-2 border-orange-600 pb-1" : "text-black"}} hover:text-orange-700" {{$attributes}}>
  {{$slot}}
</a>