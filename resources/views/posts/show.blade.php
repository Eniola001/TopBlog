<x-layout>
  <div class="text-right w-80% mt-12 mx-auto">
    @can('edit-post', $post)
    <div class="mt-4">
      <button class="border border-gray-600 hover:bg-gray-200 duration-200 text-gray-600 text-sm font-semibold py-2 px-3 my-4 rounded">
        <a href="/posts/{{$post->id}}/edit">
          Edit Post
        </a>
      </button>
    </div>
    @endcan
  </div>
  <div class="mb-12 border border-gray-300 w-80% mx-auto py-16 px-24 shadow-md">
    <div class="flex justify-between space-x-2 mb-5 font-raleway">
      <div class="flex space-x-2 items-center">
        <p>{{$post->date}}</p>
        <x-dot />
        <p>{{$post->read_time}} read</p>
      </div>
      <div class="flex space-x-2 items-center">
        <p class="hover:underline hover:text-orange-600">{{$post->user->name}}</p>
        <img src="{{$post->user->image}}" class="w-12 rounded-full" alt="">
      </div>
    </div>
    <div class="text-5xl font-bold font-crimson my-3">{{$post->title}}</div>
    <div class="text-lg font-medium my-3">{{$post->subtitle}}</div>
    <div class="my-10 mx-auto w-full"><img src="{{$post->image}}" class="w-full h-96" alt=""></div>
    <div class="font-light text-justify">
      {!! $post->body !!}
    </div>
    <div class="mt-12 text-orange-600 flex space-x-2">
      @foreach ($tags as $tag => $hashtag)
      <a href="/tags/{{strtolower($tag)}}" class="hover:underline">{{$hashtag}}</a>
      @endforeach
    </div>
    <div class="flex items-center mt-16 py-4 border-t border-black space-x-6">
      <x-css-facebook class="text-gray-600 hover:text-blue-400 duration-300" />
      <x-bi-twitter class="text-gray-600 hover:text-blue-800 duration-300" />
      <x-fab-linkedin-in class="text-gray-600 hover:text-blue-600 duration-300 w-5" />
    </div>
    <div class="flex justify-between text-sm text-gray-500 pt-4 border-t border-black">
      <span>{{$post->views}} views</span>
      <span>{{rand(100, 1000)}} ❤</span>
      <!-- <div class="flex items-center space-x-px">
        <span>{{rand(1, 300)}} </span><x-heroicon-s-heart class="h-5 text-red-600"/>
      </div> -->
    </div>
  </div>
  <div class="border border-gray-300 w-80% mx-auto py-12 px-20 shadow-md">
    <h2 id="comments" class="text-xxl font-crimson font-bold border-b border-gray-300 mb-6">Add a comment</h2>
    <div class="mb-16 font-crimson">
      <form action="/posts/{{$post->id}}" method="POST">
        @csrf
        <div class="flex flex-col mb-6">
          <label for="author">Name:</label>
          <input class="text-sm border-b border-black px-0 py-3 w-96 hover:border-orange-600 focus:outline-none focus:border-orange-600 bg-transparent" type="text" id="author" name="author" required>
        </div>
        <div class="flex flex-col ">
          <label for="comment">Comment:</label>
          <textarea id="comment" name="comment" class="border-b border-black text-sm w-96 px-0 py-3 hover:border-orange-600 focus:outline-none focus:border-orange-600 bg-transparent" required></textarea>
        </div>
        <div>
          <button type="submit" class="px-5 py-2 my-4 bg-orange-600 text-white text-sm font-raleway">Post</button>
        </div>
      </form>
    </div>

    <h2 id="comments" class="text-xxl font-crimson font-bold border-b border-gray-300 mb-6">Comments ({{ $post->comments()->count() }})</h2>
    <div class="space-y-4">
      @foreach ($comments as $comment)
      <div class="bg-gray-50 px-8 py-6 rounded-lg shadow">
        <div class="flex items-center justify-between mb-2">
          <div class="font-bold font-raleway text-lg text-gray-600">{{ $comment->author }}</div>
          <div class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</div>
        </div>
        <div class="flex flex-col-reverse">
          <p class="font-raleway text-md">{{ $comment->comment }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</x-layout>