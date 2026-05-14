<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-emerald-800 leading-tight">
            {{ __('My Health Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-2">Welcome, {{ auth()->user()->name }}!</h3>
                    <p class="text-gray-600">This is your personal health portal. You can view your clinic visit history and treatment records here.</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Recent Visits</h3>
                    <div class="text-center py-8 text-gray-500 italic">
                        <p class="mb-4">No health records found. Stay healthy!</p>
                        <a href="{{ route('student.visits.history') }}" class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 transition not-italic">View Full History</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
