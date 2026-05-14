<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-emerald-800 leading-tight">
            {{ __('Edit Medicine: ') }} {{ $medicine->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.inventory.update', ['inventory' => $medicine->id]) }}" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Medicine Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $medicine->name)" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Stock -->
                            <div>
                                <x-input-label for="stock" :value="__('Current Stock')" />
                                <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" :value="old('stock', $medicine->stock)" required />
                                <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                            </div>

                            <!-- Unit -->
                            <div>
                                <x-input-label for="unit" :value="__('Unit')" />
                                <select id="unit" name="unit" class="block mt-1 w-full border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 rounded-md shadow-sm">
                                    <option value="pcs" {{ old('unit', $medicine->unit) == 'pcs' ? 'selected' : '' }}>Pieces (pcs)</option>
                                    <option value="bottles" {{ old('unit', $medicine->unit) == 'bottles' ? 'selected' : '' }}>Bottles</option>
                                    <option value="boxes" {{ old('unit', $medicine->unit) == 'boxes' ? 'selected' : '' }}>Boxes</option>
                                    <option value="strips" {{ old('unit', $medicine->unit) == 'strips' ? 'selected' : '' }}>Strips</option>
                                </select>
                                <x-input-error :messages="$errors->get('unit')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Low Stock Threshold -->
                        <div>
                            <x-input-label for="low_stock_threshold" :value="__('Low Stock Warning Threshold')" />
                            <x-text-input id="low_stock_threshold" class="block mt-1 w-full" type="number" name="low_stock_threshold" :value="old('low_stock_threshold', $medicine->low_stock_threshold)" required />
                            <x-input-error :messages="$errors->get('low_stock_threshold')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end gap-4 mt-6">
                            <a href="{{ route('admin.inventory.index') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">Cancel</a>
                            <x-primary-button class="bg-emerald-600 hover:bg-emerald-700">
                                {{ __('Update Inventory') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
