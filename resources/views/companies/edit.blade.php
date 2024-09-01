<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Edit Company') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <h3 class="text-2xl font-bold mb-4">Edit Company Details</h3>

                  <!-- Form for Editing Company -->
                  <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')

                      <!-- Name -->
                      <div class="mb-4">
                          <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company Name <span class="text-red-500">*</span></label>
                          <input type="text" id="name" name="name" value="{{ old('name', $company->name) }}" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                          @error('name')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <!-- Email -->
                      <div class="mb-4">
                          <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                          <input type="email" id="email" name="email" value="{{ old('email', $company->email) }}" class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                          @error('email')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <!-- Website -->
                      <div class="mb-4">
                          <label for="website" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Website</label>
                          <input type="url" id="website" name="website" value="{{ old('website', $company->website) }}" class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                          @error('website')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <!-- Logo -->
                      <div class="mb-4">
                          <label for="logo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company Logo</label>
                          <input type="file" id="logo" name="logo" class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                          @error('logo')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                          @if($company->logo)
                              <div class="mt-4">
                                  <img src="{{ asset('storage/' . $company->logo) }}" alt="Current Logo" class="max-w-xs rounded-lg border border-gray-300 shadow-sm">
                                  <p class="text-sm text-gray-500 mt-2">Current logo</p>
                              </div>
                          @endif
                      </div>

                      <!-- Submit Button -->
                      <div class="flex space-x-4">
                          <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                              Save Changes
                          </button>

                          <a href="{{ route('companies.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                              Cancel
                          </a>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
