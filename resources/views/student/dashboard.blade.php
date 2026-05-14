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

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Stats -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-emerald-500">
                    <div class="p-6 text-gray-900">
                        <div class="text-sm font-medium text-gray-500 uppercase">Total Clinic Visits</div>
                        <div class="text-3xl font-bold text-emerald-600">{{ $stats['total_visits'] }}</div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-indigo-500">
                    <div class="p-6 text-gray-900">
                        <div class="text-sm font-medium text-gray-500 uppercase">Last Visit Date</div>
                        <div class="text-3xl font-bold text-indigo-600">
                            {{ $stats['last_visit'] ? \Carbon\Carbon::parse($stats['last_visit']->visit_date)->format('M d, Y') : 'None' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">Most Recent Visit</h3>
                        <a href="{{ route('student.visits.history') }}" class="text-sm text-emerald-600 hover:underline">View Full History &rarr;</a>
                    </div>
                    
                    @if($stats['last_visit'])
                        <div class="bg-emerald-50/50 rounded-xl p-6 border border-emerald-100">
                            <div class="grid md:grid-cols-3 gap-6">
                                <div>
                                    <h4 class="text-xs font-bold text-gray-400 uppercase mb-1">Symptoms</h4>
                                    <p class="text-gray-800">{{ $stats['last_visit']->symptoms }}</p>
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-gray-400 uppercase mb-1">Diagnosis</h4>
                                    <p class="text-gray-800">{{ $stats['last_visit']->diagnosis }}</p>
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-gray-400 uppercase mb-1">Treatment</h4>
                                    <p class="text-gray-800 font-medium text-emerald-700">{{ $stats['last_visit']->treatment }}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-8 text-gray-500 italic">
                            No health records found. Stay healthy!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
