<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mb-4 font-medium text-sm text-red-600">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Company Details -->
                    <div class="space-y-6">
                        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                            <h3 class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $company->name }}</h3>
                            <p class="text-lg text-gray-700 dark:text-gray-300 mt-2">
                                <span class="font-semibold">Company URL:</span> 
                                <a href="{{ $company->website }}" class="text-blue-600 hover:text-blue-800" target="_blank">{{ $company->website }}</a>
                            </p>
                            <p class="text-lg text-gray-700 dark:text-gray-300">
                                <span class="font-semibold">Email:</span> {{ $company->email ?? 'N/A' }}
                            </p>

                            @if($company->logo)
                                <div class="mt-4">
                                    <span class="font-semibold">Company Logo:</span>
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }} Logo" class="max-w-xs rounded-lg border border-gray-300 shadow-sm">
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex space-x-4 mt-6">
                            <a href="{{ route('companies.edit', $company->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Edit
                            </a>

                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                                    Delete
                                </button>
                            </form>

                            <a href="{{ route('companies.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                Back to List
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
