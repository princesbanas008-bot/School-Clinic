<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-800 leading-tight">
            {{ __('Admin Clinic Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Stats -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-indigo-500">
                    <div class="p-6 text-gray-900">
                        <div class="text-sm font-medium text-gray-500 uppercase">Total Visits Today</div>
                        <div class="text-3xl font-bold text-indigo-600">0</div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-emerald-500">
                    <div class="p-6 text-gray-900">
                        <div class="text-sm font-medium text-gray-500 uppercase">Total Medicines</div>
                        <div class="text-3xl font-bold text-emerald-600">0</div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-rose-500">
                    <div class="p-6 text-gray-900">
                        <div class="text-sm font-medium text-gray-500 uppercase">Low Stock Alerts</div>
                        <div class="text-3xl font-bold text-rose-600">0</div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('admin.visits.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">Record New Visit</a>
                        <button class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 transition">Add Medicine</button>
                        <a href="{{ route('admin.visits.index') }}" class="px-4 py-2 bg-slate-600 text-white rounded-md hover:bg-slate-700 transition">View All History</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
