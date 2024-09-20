<x-layout>
  <div class="my-10 max-w-4xl mx-auto px-16 py-8 rounded-lg shadow-lg">
    <x-form.form-head>Edit Post</x-form.form-head>
    <form action="/posts/{{$post->id}}" method="POST" enctype="multipart/form-data" class="font-raleway">
      @csrf
      @method('PATCH')
      <div class="mb-4">
        <x-form.form-label for="title" class="font-semibold text-lg">Title:</x-form.form-label>
        <x-form.form-input type="text" name="title" placeholder="Enter your post title" value="{{$post->title}}" required />
        <x-form.form-error name="title" />
      </div>
      <div class="mb-4">
        <x-form.form-label for="subtitle" class="font-semibold text-lg">Subtitle:</x-form.form-label>
        <x-form.form-input type="text" name="subtitle" placeholder="Create a blog post subtitle that summarizes your post in a few short sentences" value="{{$post->subtitle}}" />
        <x-form.form-error name="subtitle" required />
      </div>
      <div class="mb-4">
        <x-form.form-label for="image" class="font-semibold text-lg">Upload Image:</x-form.form-label>
        <x-form.form-input type="file" name="image" value="{{$post->image}}" />
        <x-form.form-error name="image" />
      </div>
      <div class="mb-4">
        <x-form.form-label for="body" class="font-semibold text-lg">Body:</x-form.form-label>
        <textarea id="body" name="body" class="w-full px-3 py-2 border rounded shadow focus:outline-none focus:shadow-outline" value="{{ old('body') }}" required>{{$post->body}}</textarea>
      </div>
      <div class="mb-4">
        <x-form.form-label for="category_id" class="font-semibold text-lg">Category:</x-form.form-label>
        <select name="category_id" id="category_id" class="mt-2 p-3 w-full border rounded-lg focus:outline-none focus:ring-1 focus:ring-black" required>
          <option value="" disabled selected>Select to choose</option>
          @foreach($categories as $category)
          <option value="{{ $category->id }}"
            {{ $category->id == $post->category_id ? 'selected' : '' }}>
            {{ $category->name }}
          </option>
          @endforeach
        </select>
      </div>
      <div class="mb-4">
        <x-form.form-label for="read_time" class="font-semibold text-lg">Read Time <span class="font-light">(in mins)</span>:</x-form.form-label>
        <x-form.form-input type="text" name="read_time" placeholder="e.g. 2 min, 4 min" value="{{$post->read_time}}" required />
        <x-form.form-error name="read_time" />
      </div>
      <div class="mb-4">
        <x-form.form-label for="tags" class="font-semibold text-lg">Tags <span class="font-light">(comma separated)</span>:</x-form.form-label>
        <x-form.form-input type="text" name="tags" placeholder="Frontend,Education,Culinary" value="{{$post->tags}}" />
        <x-form.form-error name="tags" />
      </div>
      <div class="flex items-center justify-between">
        <div>
          <button form="delete" class="text-sm text-white font-medium font-raleway px-3 py-2 bg-red-600 rounded duration-200 hover:bg-red-700">
            Delete Post
          </button>
        </div>
        <div class="mb-4 flex items-center space-x-3">
          <button class="px-5 py-2 my-4 border border-gray-600 hover:bg-gray-200 duration-200 text-gray-600 text-sm rounded font-medium font-raleway"><a href="/posts/{{$post->id}}">Cancel</a></button>
          <button type="submit" class="px-5 py-2 my-4 bg-orange-600 hover:bg-orange-700 duration-200 text-white font-medium font-raleway rounded">Update</button>
        </div>
      </div>
    </form>
    <form method="POST" action="/posts/{{$post->id}}" id="delete">
      @csrf
      @method('DELETE')
    </form>
  </div>

  <script>
    CKEDITOR.replace('body');
  </script>

</x-layout>