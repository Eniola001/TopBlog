<x-layout>
  <x-form.form-container>
    <x-form.form-head>Sign Up</x-form.form-head>
    <form method="POST" action="/register" enctype="multipart/form-data">
      @csrf
      <div class="mb-4">
        <x-form.form-label for="name">Name</x-form.form-label>
        <x-form.form-input type="text" name="name" />
        <x-form.form-error name="name" />
      </div>
      <div class="mb-4">
        <x-form.form-label for="email">Email</x-form.form-label>
        <x-form.form-input type="email" name="email" />
        <x-form.form-error name="email" />
      </div>
      <div class="mb-4">
        <x-form.form-label for="password">Password</x-form.form-label>
        <x-form.form-input type="password" name="password" />
        <x-form.form-error name="password" />
      </div>
      <div class="mb-6">
        <x-form.form-label for="password_confirmation">Confirm Password</x-form.form-label>
        <x-form.form-input type="password" name="password_confirmation" />
        <x-form.form-error name="password_confirmation" />
      </div>
      <div class="mb-6">
        <x-form.form-label for="image">User Image</x-form.form-label>
        <x-form.form-input type="file" name="image" />
        <x-form.form-error name="image" />
      </div>
      <x-form.form-button>Sign Up</x-form.form-button>
    </form>
    <p class="mt-6 text-center text-gray-600">Already have an account? <a href="/login" class="text-blue-500 font-bold hover:underline">Log in</a></p>
  </x-form.form-container>
</x-layout>