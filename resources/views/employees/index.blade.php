<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Employees') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <!-- Heading and Navigation -->
                  <div class="flex items-center justify-between mb-4">
                      <h3 class="text-2xl font-bold">Employee List</h3>
                      <a href="{{ route('employees.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                          Add New Employee
                      </a>
                  </div>

                  <!-- Employee Table -->
                  @if($employees->isEmpty())
                      <p class="text-gray-500">No employees found.</p>
                  @else
                      <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                          <thead class="bg-gray-50 dark:bg-gray-700">
                              <tr>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                      First Name
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                      Last Name
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                      Email
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                      Phone
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                      Company
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                      Actions
                                  </th>
                              </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                              @foreach($employees as $employee)
                                  <tr>
                                      <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-100">
                                          {{ $employee->first_name }}
                                      </td>
                                      <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                          {{ $employee->last_name }}
                                      </td>
                                      <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                          {{ $employee->email }}
                                      </td>
                                      <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                          {{ $employee->phone }}
                                      </td>
                                      <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                          {{ $employee->company->name ?? 'N/A' }}
                                      </td>
                                      <td class="px-6 py-4 text-sm font-medium">
                                          <a href="{{ route('employees.show', $employee->id) }}" class="text-blue-600 hover:text-blue-900">View</a>
                                          <a href="{{ route('employees.edit', $employee->id) }}" class="text-green-600 hover:text-green-900 ml-4">Edit</a>
                                          <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline-block ml-4">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                          </form>
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>

                      <!-- Pagination -->
                      <div class="mt-4">
                          {{ $employees->links() }}
                      </div>
                  @endif
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
