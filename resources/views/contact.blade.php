<x-layout>
  <div class="bg-orange-200 text-gray-700 pt-8 px-20">
    <div class="flex">
      <div class="w-2/5">
        <div class="flex flex-col text-left font-crimson font-medium">
          <div class="py-3">
            <p class="text-2xxl font-bold font-gupter mb-4 text-black">Reach out to us:</p>
          </div>
          <div class="space-y-3">
            <div class="flex items-center space-x-16">
              <div>
                <p><x-heroicon-o-phone class="w-4" /></p>
                <p class="text-md">123-456-7890</p>
              </div>
              <div>
                <p><x-letsicon-message class="w-4" /></p>
                <p class="text-md">info@mysite.com</p>
              </div>
            </div>
            <div>
              <p><x-heroicon-s-map-pin class="w-4" /></p>
              <p class="text-md">5678 Oak Avenue <br>
                Suite 300 <br>
                Metropolis, NY 10001<br>
                USA</p>
            </div>
          </div>

        </div>
      </div>
      <div class="w-3/5 px-6 py-3">
        <p class="text-2xxl text-black font-semibold font-gupter mb-8">Contact Us</p>
        <form action="/contact">
          @csrf
          <div class="space-y-8">
            <div class="flex space-x-8">
              <div class="flex flex-col">
                <x-contact-label for="first_name">First Name</x-contact-label>
                <x-contact-input type="text" name="first_name" id="first_name" class="w-72"></x-contact-input>
              </div>
              <div class="flex flex-col">
                <x-contact-label for="last_name">Last Name</x-contact-label>
                <x-contact-input type="text" name="last_name" id="last_name" class="w-72"></x-contact-input>
              </div>
            </div>
            <div class="flex flex-col">
              <x-contact-label for="email">Email *</x-contact-label>
              <x-contact-input type="email" name="email" id="email" required></x-contact-input>
            </div>
            <div class="flex flex-col">
              <x-contact-label for="message">Message</x-contact-label>
              <textarea name="message" id="message" class="border-b border-black font-crimson px-0 py-3 hover:border-orange-600 focus:outline-none focus:border-orange-600 bg-transparent resize-none"></textarea>
            </div>
            <div class="flex justify-end">
              <x-button type="submit">
                Submit
              </x-button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout>