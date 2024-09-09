<x-layout>
  <div class="my-10 max-w-4xl mx-auto px-16 py-8 rounded-lg shadow-lg">
    <x-form.form-head>Create Post</x-form.form-head>

    @if ($errors->any())
    <div class="bg-red-100 border text-sm border-red-400 text-red-700 px-4 py-3 rounded mb-4">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form action="/blog/create" method="POST" enctype="multipart/form-data" class="font-raleway">
      @csrf
      <div class="mb-4">
        <x-form.form-label for="title" class="font-semibold text-lg">Title:</x-form.form-label>
        <x-form.form-input type="text" name="title" placeholder="Enter your post title" required />
        <x-form.form-error name="title" />
      </div>
      <div class="mb-4">
        <x-form.form-label for="subtitle" class="font-semibold text-lg">Subtitle:</x-form.form-label>
        <x-form.form-input type="text" name="subtitle" placeholder="Create a blog post subtitle that summarizes your post in a few short sentences" required />
        <x-form.form-error name="subtitle" />
      </div>
      <div class="mb-4">
        <x-form.form-label for="image" class="font-semibold text-lg">Upload Image:</x-form.form-label>
        <x-form.form-input type="file" name="image" required />
        <x-form.form-error name="image" />
      </div>
      <div class="mb-4">
        <x-form.form-label for="body" class="font-semibold text-lg">Body:</x-form.form-label>
        <textarea id="body" name="body" class="w-full px-3 py-2 border rounded shadow focus:outline-none focus:shadow-outline" required>{{ old('body') }}</textarea>
      </div>
      <div class="mb-4">
        <x-form.form-label for="category_id" class="font-semibold text-lg">Category:</x-form.form-label>
        <select name="category_id" id="category_id" class="mt-2 p-3 w-full border rounded-lg focus:outline-none focus:ring-1 focus:ring-black" required>
          <option value="" disabled selected>Select to choose</option>
          <option value="1">Education</option>
          <option value="2">Lifestyle & Health</option>
          <option value="3">Business & Finance</option>
          <option value="4">Entertainment</option>
          <option value="5">Arts & Culture</option>
          <option value="6">Sports & Fitness</option>
          <option value="7">Faith & Spirituality</option>
          <option value="8">Technology</option>
          <option value="9">Career & Professional Development</option>
        </select>
      </div>
      <div class="mb-4">
        <x-form.form-label for="read_time" class="font-semibold text-lg">Read Time <span class="font-light">(in mins)</span>:</x-form.form-label>
        <x-form.form-input type="text" name="read_time" placeholder="e.g. 2 min, 4 min" required />
        <x-form.form-error name="read_time" />
      </div>
      <div class="mb-4">
        <x-form.form-label for="tags" class="font-semibold text-lg">Tags <span class="font-light">(comma separated)</span>:</x-form.form-label>
        <x-form.form-input type="text" name="tags" placeholder="Frontend,Education,Culinary" />
        <x-form.form-error name="tags" />
      </div>
      <div class="mb-4 flex justify-between">
        <button class="px-5 py-2 my-4 border border-gray-600 hover:bg-gray-200 duration-200 text-gray-600 text-sm rounded font-medium font-raleway"><a href="/blog">Cancel</a></button>
        <button type="submit" class="px-5 py-2 my-4 bg-orange-600 hover:bg-orange-700 duration-200 text-white font-medium font-raleway rounded">Upload</button>
      </div>
    </form>
  </div>

  <script>
    CKEDITOR.replace('body');
  </script>

</x-layout>