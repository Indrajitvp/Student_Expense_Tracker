<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:scale-105">
                <div class="p-8 text-gray-100">
                    <div class="flex items-center justify-between">
                        <h3 class="text-3xl font-extrabold text-white">
                            Hello there!
                        </h3>
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('expenses.index') }}" class="inline-block px-8 py-4 bg-gradient-to-r from-green-500 to-lime-600 text-white font-bold rounded-lg shadow-xl hover:from-green-600 hover:to-lime-700 transform transition-all duration-300 hover:scale-105">
                            Go to Expenses
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
