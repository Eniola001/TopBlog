<x-layout>
  <x-form.form-container>
    <x-form.form-head>Log In</x-form.form-head>
    <form action="/login" method="POST">
      @csrf
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
      <x-form.form-button>Login</x-form.form-button>
    </form>
    <p class="mt-6 text-center text-gray-600">Don't have an account? <a href="/register" class="text-blue-500 font-bold hover:underline">Sign Up</a></p>
  </x-form.form-container>
</x-layout>