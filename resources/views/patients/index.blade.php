<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800">Patient Management</h2>
            <a href="{{ route('patients.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold shadow hover:bg-blue-700">
                + Add New Patient
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border">
                
                <p class="mb-6 text-sm text-gray-500">
                    Logged in as: <span class="font-bold text-blue-600 uppercase">{{ auth()->user()->role }}</span>
                </p>

                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b">
                            <th class="p-4 text-left text-xs font-bold text-gray-500 uppercase">Patient Name</th>
                            <th class="p-4 text-left text-xs font-bold text-gray-500 uppercase">Assigned Doctor</th>
                            <th class="p-4 text-right text-xs font-bold text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse ($patients as $patient)
                            <tr class="hover:bg-gray-50">
                                <td class="p-4 font-semibold text-gray-800">{{ $patient->first_name }} {{ $patient->last_name }}</td>
                                <td class="p-4">
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full font-bold">
                                        Dr. {{ $patient->doctor->last_name ?? 'N/A' }}
                                    </span>
                                </td>
                                <td class="p-4 text-right space-x-2">
                                    <a href="{{ route('patients.show', $patient) }}" class="text-gray-500 font-bold hover:text-blue-600">View</a>
                                    
                                    @if(auth()->user()->role === 'admin')
                                        <a href="{{ route('patients.edit', $patient) }}" class="text-blue-600 font-bold">Edit</a>
                                        <form action="{{ route('patients.destroy', $patient) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-500 font-bold" onclick="return confirm('Delete?')">Delete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="p-10 text-center text-gray-400">No records found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>