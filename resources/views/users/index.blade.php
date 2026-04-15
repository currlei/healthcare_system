<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800">Manage Users (Admin Only)</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Success Message Alert -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-sm rounded-r">
                    <p class="font-bold">Success!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b">
                            <th class="p-4 text-left text-xs font-bold text-gray-500 uppercase">Name</th>
                            <th class="p-4 text-left text-xs font-bold text-gray-500 uppercase">Email</th>
                            <th class="p-4 text-left text-xs font-bold text-gray-500 uppercase">Current Role</th>
                            <th class="p-4 text-right text-xs font-bold text-gray-500 uppercase">Update Role</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-50">
                                <td class="p-4 font-semibold text-gray-800">{{ $user->name }}</td>
                                <td class="p-4 text-gray-600">{{ $user->email }}</td>
                                <td class="p-4">
                                    <span class="px-2 py-1 text-xs rounded-full font-bold {{ $user->role === 'admin' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                        {{ strtoupper($user->role) }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    <!-- Role Change Form -->
                                    <form action="{{ route('users.updateRole', $user) }}" method="POST" class="flex justify-end items-center gap-2">
                                        @csrf
                                        @method('PATCH')
                                        
                                        <select name="role" class="text-xs border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>USER</option>
                                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>ADMIN</option>
                                        </select>
                                        
                                        <button type="submit" class="bg-gray-800 hover:bg-black text-white text-[10px] font-bold py-1.5 px-3 rounded uppercase transition">
                                            Update
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($users->isEmpty())
                    <p class="p-4 text-center text-gray-500 italic">No other users found in the system.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
