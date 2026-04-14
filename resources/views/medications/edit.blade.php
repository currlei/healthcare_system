<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            Edit Medication: {{ $medication->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 border border-gray-100">
                
                <form action="{{ route('medications.update', $medication) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <!-- Medicine Name -->
                        <div>
                            <x-input-label for="name" :value="__('Medicine Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $medication->name)" required />
                        </div>

                        <!-- Dosage -->
                        <div>
                            <x-input-label for="dosage" :value="__('Dosage (e.g. 500mg)')" />
                            <x-text-input id="dosage" name="dosage" type="text" class="mt-1 block w-full" :value="old('dosage', $medication->dosage)" required />
                        </div>

                        <!-- Description -->
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea name="description" rows="4" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('description', $medication->description) }}</textarea>
                        </div>
                    </div>

                    <div class="mt-8 flex items-center gap-4">
                        <x-primary-button class="bg-indigo-600 hover:bg-indigo-700">
                            {{ __('Update Medication') }}
                        </x-primary-button>
                        <a href="{{ route('medications.index') }}" class="text-sm text-gray-600 hover:underline">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>