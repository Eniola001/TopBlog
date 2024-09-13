<x-layout>
  <div class="w-80% mx-auto mt-12">
    <div class="mb-5 px-6 py-2 bg-orange-600 w-fit hover:bg-orange-800 duration-200 rounded-full">
      <a href="/blog" class="pb-2 text-lg text-white font-crimson">All Posts</a>
    </div>
    <h1 class="text-3xl font-crimson">Category: <span class="font-bold text-orange-600">"{{$category}}"</span></h1>
    <div class="my-8">
      <div class="grid grid-cols-2 gap-8">
        @foreach($posts as $post)
        <a href="/posts/{{$post->id}}">
          <x-blog-card :$post />
        </a>
        @endforeach
      </div>
    </div>
  </div>
</x-layout>