<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-indigo-800 leading-tight">
                {{ __('Clinic Visit History') }}
            </h2>
            <a href="{{ route('admin.visits.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition shadow-sm text-sm font-medium">
                Record New Visit
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Filter -->
                    <form method="GET" action="{{ route('admin.visits.index') }}" class="mb-6 flex gap-4 items-end">
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Filter by Date</label>
                            <input type="date" name="date" id="date" value="{{ request('date') }}" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <button type="submit" class="px-4 py-2 bg-slate-100 text-slate-700 rounded-md hover:bg-slate-200 transition text-sm font-medium border border-slate-300">Filter</button>
                        <a href="{{ route('admin.visits.index') }}" class="px-4 py-2 text-indigo-600 hover:text-indigo-900 text-sm font-medium underline">Clear</a>
                    </form>

                    @if($visits->isEmpty())
                        <div class="text-center py-12 text-gray-500">
                            No health visits found.
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Symptoms</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Diagnosis</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Treatment</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($visits as $visit)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ \Carbon\Carbon::parse($visit->visit_date)->format('M d, Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-600">{{ $visit->student->name }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($visit->symptoms, 30) }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($visit->diagnosis, 30) }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($visit->treatment, 30) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('admin.visits.edit', $visit) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                                <form id="delete-form-visit-{{ $visit->id }}" action="{{ route('admin.visits.destroy', $visit) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="confirmDelete('visit-{{ $visit->id }}')" class="text-rose-600 hover:text-rose-900">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $visits->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
