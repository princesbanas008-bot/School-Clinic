<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-emerald-800 leading-tight">
            {{ __('My Clinic Visit History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($visits->isEmpty())
                        <div class="text-center py-12 text-gray-500 italic">
                            <p class="text-lg">No health records found.</p>
                            <p class="text-sm">If you have visited the clinic recently, your records will appear here once the staff has logged them.</p>
                        </div>
                    @else
                        <div class="space-y-6">
                            @foreach($visits as $visit)
                                <div class="border border-emerald-100 rounded-xl p-6 bg-emerald-50/30 hover:shadow-md transition">
                                    <div class="flex justify-between items-start mb-4">
                                        <div class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs font-bold uppercase">
                                            {{ \Carbon\Carbon::parse($visit->visit_date)->format('M d, Y') }}
                                        </div>
                                    </div>
                                    <div class="grid md:grid-cols-3 gap-6">
                                        <div>
                                            <h4 class="text-xs font-bold text-gray-400 uppercase mb-1">Symptoms</h4>
                                            <p class="text-gray-800">{{ $visit->symptoms }}</p>
                                        </div>
                                        <div>
                                            <h4 class="text-xs font-bold text-gray-400 uppercase mb-1">Diagnosis</h4>
                                            <p class="text-gray-800">{{ $visit->diagnosis }}</p>
                                        </div>
                                        <div>
                                            <h4 class="text-xs font-bold text-gray-400 uppercase mb-1">Treatment</h4>
                                            <p class="text-gray-800 font-medium text-emerald-700">{{ $visit->treatment }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-6">
                            {{ $visits->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
