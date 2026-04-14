<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800">Add New Doctor</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('doctors.store') }}" method="POST" class="bg-white p-8 shadow-sm rounded-xl border">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700">First Name</label>
                        <input type="text" name="first_name" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Last Name</label>
                        <input type="text" name="last_name" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-bold text-gray-700">Specialization</label>
                        <input type="text" name="specialization" placeholder="e.g. Pediatrics, Cardiology" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Contact Number</label>
                        <input type="text" name="contact_number" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Email Address</label>
                        <input type="email" name="email" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                </div>
                <div class="mt-8 flex items-center">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-bold">Save Doctor</button>
                    <a href="{{ route('doctors.index') }}" class="ml-4 text-gray-500">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>