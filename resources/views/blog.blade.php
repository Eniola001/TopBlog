<x-layout>
  <div class="w-80% mx-auto">
    <div class="mt-14 max-w-lg mx-auto">
      <form action="/search">
        <input type="text" class="w-full px-8 py-4 rounded-full border border-gray-400 focus:border-transparent focus:outline-none  focus:ring-2 focus:ring-orange-300 bg-white" name="search" placeholder="Search...">
      </form>
    </div>
    <div class="flex justify-between items-center pt-16 pb-7">
      <h1 class="text-5xl font-gupter font-bold">Blog</h1>
      @guest
      <div class="space-x-2 font-raleway">
        <a href="/register" class="hover:text-orange-600 duration-200">Sign Up</a>
        <span>//</span>
        <a href="/login" class="hover:text-orange-600 duration-200">Login</a>
      </div>
      @endguest
      @auth
      <div class="space-x-2 font-raleway flex">
        <a href="/blog/create" class=" hover:text-orange-600 duration-200">Create Post</a>
        <span>//</span>
        <form method="POST" action="/logout">
          @csrf
          @method('DELETE')
          <button class="hover:text-red-700 duration-200" type="submit">Log Out</button>
        </form>
      </div>
      @endauth
    </div>
    @if (session('success'))
    <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
      {{ session('success') }}
    </div>
    @if (session('deleted'))
      <div id="success-message" class="bg-red-200 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
      </div>
      @endif
    @endif
    <div class="flex space-x-4 font-crimson text-xl pb-2">
      <a href="/blog">All Posts</a>
      <div class="group">
        <button class="hover:text-gray-500">Categories</button>
        <div class="dropdown-content absolute hidden bg-white text-sm font-raleway w-48">
          @foreach ($categories as $category)
          <a href="/categories/{{$category->id}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">{{$category->name}}</a>
          @endforeach
        </div>
      </div>
    </div>
    <div class="py-8 mx-auto">
      <div class="grid grid-cols-2 gap-8">
        @foreach($posts as $post)
        <a href="/posts/{{$post->id}}">
          <x-blog-card :$post />
        </a>
        @endforeach
      </div>
      <div class="my-6">
        {{$posts->links()}}
      </div>
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