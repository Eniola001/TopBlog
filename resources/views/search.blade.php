<x-layout>
  <div class="w-80% mx-auto">
    <div class="mt-14 max-w-lg mx-auto">
      <form action="/search">
        <x-searchbar />
        <x-form.form-error name="search" />
      </form>
    </div>
    <div class="mt-12 px-6 py-2 bg-orange-600 w-fit hover:bg-orange-800 duration-200 rounded-full">
      <a href="/blog" class="pb-2 text-lg text-white font-crimson">All Posts</a>
    </div>
    <h1 class="text-3xl my-4 font-crimson">You searched for: <b>"{{ $search }}"</b></h1>
    @if($posts->isEmpty())
    <p class="text-2xl font-raleway text-red-700 mt-10 text-center"><b>No results found ☹</b></p>
    @endif
    <div class="py-8">
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