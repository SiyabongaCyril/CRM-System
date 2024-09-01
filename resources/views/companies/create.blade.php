<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Add New Company') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <form id="company-form" method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                      @csrf

                      <div class="mb-4">
                          <label for="name" class="block text-gray-700 dark:text-gray-300">
                              Company Name <span class="text-red-500">*</span>
                          </label>
                          <input type="text" id="name" name="name" value="{{ old('name') }}" required 
                                 class="mt-1 block w-full border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                          <span id="name-error" class="text-red-500 text-sm"></span>
                      </div>

                      <div class="mb-4">
                          <label for="email" class="block text-gray-700 dark:text-gray-300">
                              Email
                          </label>
                          <input type="email" id="email" name="email" value="{{ old('email') }}" 
                                 class="mt-1 block w-full border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                          <span id="email-error" class="text-red-500 text-sm"></span>
                      </div>

                      <div class="mb-4">
                          <label for="logo" class="block text-gray-700 dark:text-gray-300">
                              Logo
                          </label>
                          <input type="file" id="logo" name="logo" 
                                 class="mt-1 block w-full border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                          <span id="logo-error" class="text-red-500 text-sm"></span>
                      </div>

                      <div class="mb-4">
                          <label for="website" class="block text-gray-700 dark:text-gray-300">
                              Website
                          </label>
                          <input type="url" id="website" name="website" value="{{ old('website') }}" 
                                 class="mt-1 block w-full border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                          <span id="website-error" class="text-red-500 text-sm"></span>
                      </div>

                      <div class="flex items-center justify-end">
                          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                              Save Company
                          </button>
                      </div>
                  </form>

                  <script>
                      document.getElementById('company-form').addEventListener('submit', function(event) {
                          let isValid = true;

                          // Clear previous errors
                          document.querySelectorAll('.text-red-500').forEach(el => el.textContent = '');

                          // Validate name
                          const name = document.getElementById('name').value;
                          if (!name) {
                              document.getElementById('name-error').textContent = 'Company Name is required.';
                              isValid = false;
                          }

                          // Validate email
                          const email = document.getElementById('email').value;
                          if (email && !/\S+@\S+\.\S+/.test(email)) {
                              document.getElementById('email-error').textContent = 'Invalid email format.';
                              isValid = false;
                          }

                          // Validate logo
                          const logo = document.getElementById('logo').files[0];
                          if (logo && (logo.size > 2 * 1024 * 1024 || !['image/jpeg', 'image/png'].includes(logo.type))) {
                              document.getElementById('logo-error').textContent = 'Logo must be a JPEG or PNG image under 2MB.';
                              isValid = false;
                          }

                          // Validate website
                          const website = document.getElementById('website').value;
                          if (website && !/^https?:\/\/\S+$/.test(website)) {
                              document.getElementById('website-error').textContent = 'Invalid website URL.';
                              isValid = false;
                          }

                          if (!isValid) {
                              event.preventDefault(); // Prevent form submission if validation fails
                          }
                      });
                  </script>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
