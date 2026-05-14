<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-emerald-800 leading-tight">
            {{ __('Add New Medicine') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.inventory.store') }}" class="space-y-6">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Medicine Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus placeholder="e.g. Paracetamol" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Stock -->
                            <div>
                                <x-input-label for="stock" :value="__('Current Stock')" />
                                <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" :value="old('stock', 0)" required />
                                <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                            </div>

                            <!-- Unit -->
                            <div>
                                <x-input-label for="unit" :value="__('Unit')" />
                                <select id="unit" name="unit" class="block mt-1 w-full border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 rounded-md shadow-sm">
                                    <option value="pcs" {{ old('unit') == 'pcs' ? 'selected' : '' }}>Pieces (pcs)</option>
                                    <option value="bottles" {{ old('unit') == 'bottles' ? 'selected' : '' }}>Bottles</option>
                                    <option value="boxes" {{ old('unit') == 'boxes' ? 'selected' : '' }}>Boxes</option>
                                    <option value="strips" {{ old('unit') == 'strips' ? 'selected' : '' }}>Strips</option>
                                </select>
                                <x-input-error :messages="$errors->get('unit')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Low Stock Threshold -->
                        <div>
                            <x-input-label for="low_stock_threshold" :value="__('Low Stock Warning Threshold')" />
                            <x-text-input id="low_stock_threshold" class="block mt-1 w-full" type="number" name="low_stock_threshold" :value="old('low_stock_threshold', 10)" required />
                            <p class="mt-1 text-xs text-gray-500 italic">You will see a warning when stock falls below this number.</p>
                            <x-input-error :messages="$errors->get('low_stock_threshold')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end gap-4 mt-6">
                            <a href="{{ route('admin.inventory.index') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">Cancel</a>
                            <x-primary-button class="bg-emerald-600 hover:bg-emerald-700">
                                {{ __('Add to Inventory') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
