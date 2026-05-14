<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-800 leading-tight">
            {{ __('Edit Clinic Visit Record') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.visits.update', $visit) }}" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <!-- Student -->
                        <div>
                            <x-input-label for="student_id" :value="__('Student')" />
                            <select id="student_id" name="student_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}" {{ old('student_id', $visit->student_id) == $student->id ? 'selected' : '' }}>{{ $student->name }} ({{ $student->email }})</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
                        </div>

                        <!-- Date -->
                        <div>
                            <x-input-label for="visit_date" :value="__('Visit Date')" />
                            <x-text-input id="visit_date" class="block mt-1 w-full" type="date" name="visit_date" :value="old('visit_date', $visit->visit_date)" required />
                            <x-input-error :messages="$errors->get('visit_date')" class="mt-2" />
                        </div>

                        <!-- Symptoms -->
                        <div>
                            <x-input-label for="symptoms" :value="__('Symptoms')" />
                            <textarea id="symptoms" name="symptoms" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('symptoms', $visit->symptoms) }}</textarea>
                            <x-input-error :messages="$errors->get('symptoms')" class="mt-2" />
                        </div>

                        <!-- Diagnosis -->
                        <div>
                            <x-input-label for="diagnosis" :value="__('Diagnosis')" />
                            <textarea id="diagnosis" name="diagnosis" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('diagnosis', $visit->diagnosis) }}</textarea>
                            <x-input-error :messages="$errors->get('diagnosis')" class="mt-2" />
                        </div>

                        <!-- Treatment -->
                        <div>
                            <x-input-label for="treatment" :value="__('Treatment / Medication')" />
                            <textarea id="treatment" name="treatment" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('treatment', $visit->treatment) }}</textarea>
                            <x-input-error :messages="$errors->get('treatment')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end gap-4 mt-6">
                            <a href="{{ route('admin.visits.index') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">Cancel</a>
                            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700">
                                {{ __('Update Record') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
