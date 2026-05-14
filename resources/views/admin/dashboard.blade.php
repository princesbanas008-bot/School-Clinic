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
                        <div class="text-3xl font-bold text-indigo-600">{{ $stats['visits_today'] }}</div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-emerald-500">
                    <div class="p-6 text-gray-900">
                        <div class="text-sm font-medium text-gray-500 uppercase">Total Medicines</div>
                        <div class="text-3xl font-bold text-emerald-600">{{ $stats['total_medicines'] }}</div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-rose-500">
                    <div class="p-6 text-gray-900">
                        <div class="text-sm font-medium text-gray-500 uppercase">Low Stock Alerts</div>
                        <div class="text-3xl font-bold text-rose-600">{{ $stats['low_stock_count'] }}</div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('admin.visits.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition shadow-sm font-medium">Record New Visit</a>
                        <a href="{{ route('admin.inventory.create') }}" class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 transition shadow-sm font-medium">Add Medicine</a>
                        <a href="{{ route('admin.inventory.index') }}" class="px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700 transition shadow-sm font-medium">Manage Inventory</a>
                        <a href="{{ route('admin.visits.index') }}" class="px-4 py-2 bg-slate-600 text-white rounded-md hover:bg-slate-700 transition shadow-sm font-medium">View All History</a>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Visits -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-4">Recent Clinic Visits</h3>
                        @if($recent_visits->isEmpty())
                            <p class="text-gray-500 italic py-4">No recent visits recorded.</p>
                        @else
                            <div class="space-y-4">
                                @foreach($recent_visits as $visit)
                                    <div class="flex items-center justify-between p-3 bg-slate-50 rounded-lg border border-slate-100">
                                        <div>
                                            <div class="font-bold text-indigo-700">{{ $visit->student->name }}</div>
                                            <div class="text-xs text-slate-500">{{ \Carbon\Carbon::parse($visit->visit_date)->format('M d, Y') }} - {{ $visit->symptoms }}</div>
                                        </div>
                                        <a href="{{ route('admin.visits.edit', $visit) }}" class="text-xs text-indigo-600 hover:underline font-bold uppercase">View &rarr;</a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Low Stock Alerts -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-4 text-rose-700 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            Low Stock Inventory
                        </h3>
                        @if($low_stock_medicines->isEmpty())
                            <p class="text-emerald-600 italic py-4">All stock levels are sufficient.</p>
                        @else
                            <div class="space-y-4">
                                @foreach($low_stock_medicines as $medicine)
                                    <div class="flex items-center justify-between p-3 bg-rose-50 rounded-lg border border-rose-100">
                                        <div>
                                            <div class="font-bold text-rose-700">{{ $medicine->name }}</div>
                                            <div class="text-xs text-rose-500">Only {{ $medicine->stock }} {{ $medicine->unit }} remaining</div>
                                        </div>
                                        <a href="{{ route('admin.inventory.edit', $medicine) }}" class="px-3 py-1 bg-rose-600 text-white text-[10px] rounded-full uppercase font-bold">Restock</a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
