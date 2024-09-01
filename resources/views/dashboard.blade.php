<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('CRM Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Main Content -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-lg mb-4">Welcome to the CRM Dashboard. Manage your companies and employees efficiently.</p>
                    
                    <!-- Navigation Links -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-blue-500 text-white p-6 rounded-lg shadow-md">
                            <h3 class="text-xl font-semibold mb-4">Manage Companies</h3>
                            <p class="mb-4">Create, update, and view your companies.</p>
                            <a href="{{ route('companies.create') }}" class="text-white hover:text-gray-500 border border-white rounded p-1">Add new Company</a>
                            <a href="{{ route('companies.index') }}" class="text-white  hover:text-gray-500 border border-white rounded p-1">View Companies</a>
                        </div>
                        <div class="bg-green-500 text-white p-6 rounded-lg shadow-md">
                            <h3 class="text-xl font-semibold mb-4">Manage Employees</h3>
                            <p class="mb-4">Add, edit, and manage employee information.</p>
                            <a href="{{ route('employees.create') }}" class="text-white hover:text-gray-500 border border-white rounded p-1">Add New Employee</a>
                            <a href="{{ route('employees.index') }}" class="text-white  hover:text-gray-500 border border-white rounded p-1">View Employees</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
