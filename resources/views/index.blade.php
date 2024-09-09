<x-layout>
  <div class="border-b border-black">
    <div class="w-70% mx-auto py-16">
      @if (session('success'))
      <div id="success-message" class="bg-red-200 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
      </div>
      @endif
      <h1 class="uppercase text-xl tracking-widest font-raleway border border-gray-400 border-b-0 w-fit px-8 py-3">Trending Post</h1>
      <a href="/post{post}">
        <x-blog-card-border>
          <img src="{{asset('images/top-post.jpg')}}" alt="">
          <div class="py-6 px-10 space-y-3">
            <div class="flex items-center space-x-2 py-2">
              <x-author-image />
              <div>
                <x-author>Jarrod Fletcher</x-author>
                <x-date>Mar 23, 2023
                  <x-dot />
                  2 min
                </x-date>
              </div>
            </div>
            <x-blog-title>
              Back to Fiction: What I'm Reading This Summer
            </x-blog-title>
            <x-blog-text class="text-md">
              Create a blog post subtitle that summarizes your post in a few short, punchy sentences and entices your audience to continue reading....
            </x-blog-text>
            <p class="text-xs pt-2 group-hover:text-orange-600 font-medium duration-200">>>> Read more</p>
          </div>
        </x-blog-card-border>
      </a>
      <a href="/blog"><x-button class="mt-10">All Posts</x-button></a>
    </div>
  </div>

  <div class="w-80% mx-auto py-16 space-y-12">
    <h1 class="text-4xl font-raleway">Recent Posts</h1>

    <div class="flex flex-col space-y-8">
      @foreach ($recentPosts as $post)
      <a href="/posts/{{$post->id }}">
        <x-home-card :$post />
      </a>
      @endforeach
    </div>
    <a href="/blog"><x-button class="mt-10">More Posts</x-button></a>
  </div>

  <div class="border border-black border-r-0 border-l-0 mt-8 p-16">
    <div class="flex items-center justify-between">
      <p class="text-4xl font-gupter capitalize font-bold">Never miss a post.</p>
      <form action="/" method="POST">
        @csrf
        <div class="flex flex-col font-raleway">
          <label class="text-lg">Enter your email *</label>
          <div class="mt-4 space-x-10">
            <input type="email" name="email" class="w-72 border-b border-black px-4 py-3 hover:border-orange-600 focus:outline-none focus:border-orange-600" value="">
            <x-button>Subscribe</x-button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script>
    // Function to hide the success message after 5 seconds
    setTimeout(function() {
      var successMessage = document.getElementById('success-message');
      if (successMessage) {
        successMessage.classList.add('fade-out');
        successMessage.addEventListener('transitionend', function() {
          successMessage.style.display = 'none';
        });
      }
    }, 2000); // 2 seconds
  </script>
</x-layout>