<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800 tracking-tight">Pharmacy Inventory</h2>
            
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('medications.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg font-bold shadow-md transition transform hover:scale-105">
                    + Add New Medicine
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl p-8 border border-gray-100">
                
                <div class="mb-6">
                    <p class="text-sm text-gray-500 font-medium">
                        Logged in as: <span class="text-indigo-600 font-bold uppercase">{{ auth()->user()->role }}</span>
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-xs font-bold tracking-widest text-gray-400 uppercase border-b border-gray-100">
                                <th class="px-6 py-4">Medicine Name</th>
                                <th class="px-6 py-4 text-center">Dosage</th>
                                <th class="px-6 py-4">Description</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse ($medications as $med)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-5">
                                        <div class="font-bold text-gray-800 text-lg">{{ $med->name }}</div>
                                    </td>
                                    <td class="px-6 py-5 text-center">
                                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-md text-xs font-black">
                                            {{ $med->dosage }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="text-gray-500 text-sm max-w-xs truncate">{{ $med->description }}</div>
                                    </td>
                                    <td class="px-6 py-5 text-right space-x-4">
                                        @if(auth()->user()->role === 'admin')
                                            <a href="{{ route('medications.edit', $med) }}" class="text-indigo-600 hover:text-indigo-900 font-bold transition">Edit</a>
                                            <form action="{{ route('medications.destroy', $med) }}" method="POST" class="inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 font-bold transition" onclick="return confirm('Delete this medication?')">Delete</button>
                                            </form>
                                        @else
                                            <span class="text-gray-300 italic text-xs">View Only</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-12 text-center text-gray-400 italic">Pharmacy inventory is empty.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>