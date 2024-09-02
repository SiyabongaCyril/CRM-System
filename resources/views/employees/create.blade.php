<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Add New Employee') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  @if ($errors->any())
                      <div class="mb-4">
                          <ul class="list-disc list-inside text-sm text-red-600 dark:text-red-400">
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                  <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                      @csrf

                      <!-- First Name -->
                      <div class="mb-4">
                          <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">First Name <span class="text-red-600">*</span></label>
                          <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300">
                      </div>

                      <!-- Last Name -->
                      <div class="mb-4">
                          <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Name <span class="text-red-600">*</span></label>
                          <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300">
                      </div>

                      <!-- Company -->
                      <div class="mb-4">
                          <label for="company_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company <span class="text-red-600">*</span></label>
                          <select name="company_id" id="company_id" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300">
                              <option value="">Select a company</option>
                              @foreach ($companies as $company)
                                  <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                              @endforeach
                          </select>
                      </div>

                      <!-- Email -->
                      <div class="mb-4">
                          <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                          <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300">
                      </div>

                      <!-- Phone -->
                      <div class="mb-4">
                          <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                          <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300">
                      </div>

                      <!-- Submit Button -->
                      <div class="flex items-center justify-end mt-4">
                          <a href="{{ route('employees.index') }}" class="inline-flex items-center px-4 py-2 mr-4 bg-gray-600 text-white rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">Cancel</a>
                          <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                              Add Employee
                          </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
