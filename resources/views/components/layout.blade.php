<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('images/blog.jpg') }}" type="image/x-icon">
  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
  <title>My Blog</title>
  <style>
    /* Custom styles to handle the dropdown hover effect */
    .group:hover .dropdown-content {
      display: block;
    }

    .fade-out {
      transition: opacity 1s ease-out;
      opacity: 0;
    }
  </style>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col">
  <nav class="flex items-center justify-between py-4 px-20 bg-white border-b border-black z-10 fixed w-full">
    <div>
      <div class="flex items-center gap-1">
        <img src="{{asset('images/blog.jpg')}}" alt="" class="h-8">
        <h1 class="text-6xl text-orange-600 font-gupter">TopBlog</h1>
      </div>
      <h4 class="text-md text-gray-600 font-light">Thoughts on Lifestyle and Well-being</h4>
    </div>
    <div class="flex space-x-16 text-lg font-light">
      <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
      <x-nav-link href="/blog" :active="request()->is('blog')">Blog</x-nav-link>
      <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
      <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
    </div>
  </nav>
  <main class="mt-28">
    {{$slot}}
  </main>
</body>

</html>