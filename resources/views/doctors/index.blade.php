<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800">Doctor Directory</h2>
            <a href="{{ route('doctors.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold shadow">+ Add Doctor</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 border">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b">
                            <th class="p-4 text-left font-bold text-gray-500 uppercase">Name</th>
                            <th class="p-4 text-left font-bold text-gray-500 uppercase">Specialization</th>
                            <th class="p-4 text-left font-bold text-gray-500 uppercase">Email</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($doctors as $doctor)
                            <tr>
                                <td class="p-4">Dr. {{ $doctor->first_name }} {{ $doctor->last_name }}</td>
                                <td class="p-4"><span class="bg-purple-100 text-purple-700 px-2 py-1 rounded text-xs font-bold">{{ $doctor->specialization }}</span></td>
                                <td class="p-4 text-gray-600">{{ $doctor->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
