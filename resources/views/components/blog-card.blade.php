@props(['post'])

<x-blog-card-border class="flex flex-col mx-auto h-175">
  <div>
    <x-post-image class='w-full h-80' :$post />
  </div>
  <div class="flex flex-col px-10 py-8 h-full">
    <div class="flex items-center space-x-2 py-2">
      <x-author-image src="{{$post->user->image}}" />
      <div>
        <x-author>{{$post->user->name}}</x-author>
        <x-date>{{$post->date}}
          <x-dot />
          {{$post->read_time}}
        </x-date>
      </div>
    </div>
    <x-blog-title class="capitalize mb-4">
      {{$post->title}}
    </x-blog-title>
    <x-blog-text class="flex-grow text-sm border-b border-black">
      {{$post->subtitle}}
    </x-blog-text>
    <div class="flex justify-between text-xs text-gray-500 mt-2">
      <div class="space-x-4">
        <span>{{$post->views}} views</span>
        <span>{{$post->comments->count()}} comments</span>
      </div>
      <span>{{rand(1, 300)}} ❤</span>
    </div>
  </div>
</x-blog-card-border>