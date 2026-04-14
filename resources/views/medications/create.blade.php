<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800">Add New Medication</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('medications.store') }}" method="POST" class="bg-white p-8 shadow-sm rounded-xl border">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Medicine Name</label>
                        <input type="text" name="name" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Dosage (mg/ml)</label>
                        <input type="text" name="dosage" placeholder="e.g. 500mg" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Description</label>
                        <textarea name="description" rows="3" class="w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                    </div>
                </div>
                <div class="mt-8 flex items-center">
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-bold">Add to Inventory</button>
                    <a href="{{ route('medications.index') }}" class="ml-4 text-gray-500">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>