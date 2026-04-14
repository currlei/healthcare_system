<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            System Overview
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-8 mb-8 shadow-lg text-white">
                <h1 class="text-3xl font-bold">Welcome back, {{ Auth::user()->name }}!</h1>
                <p class="text-blue-100 mt-2">You are currently logged in as an <span class="bg-white text-blue-700 px-2 py-0.5 rounded text-xs font-black uppercase">{{ Auth::user()->role }}</span>. Here is what's happening in your clinic today.</p>
            </div>

            <!-- Stat Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Patients Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center">
                    <div class="p-3 bg-blue-100 rounded-lg mr-4 text-blue-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-bold uppercase">My Patients</p>
                        <h3 class="text-2xl font-black text-gray-800">Verified</h3>
                    </div>
                </div>

                <!-- Doctors Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center">
                    <div class="p-3 bg-purple-100 rounded-lg mr-4 text-purple-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-bold uppercase">Doctors</p>
                        <h3 class="text-2xl font-black text-gray-800">Directory Active</h3>
                    </div>
                </div>

                <!-- Meds Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center">
                    <div class="p-3 bg-green-100 rounded-lg mr-4 text-green-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-bold uppercase">Pharmacy</p>
                        <h3 class="text-2xl font-black text-gray-800">Inventory Ready</h3>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Quick Actions</h3>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('patients.create') }}" class="px-6 py-3 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-lg font-bold transition">
                        + New Patient
                    </a>
                    <a href="{{ route('doctors.index') }}" class="px-6 py-3 bg-purple-50 hover:bg-purple-100 text-purple-700 rounded-lg font-bold transition">
                        View Doctors
                    </a>
                    <a href="{{ route('medications.index') }}" class="px-6 py-3 bg-green-50 hover:bg-green-100 text-green-700 rounded-lg font-bold transition">
                        Check Pharmacy
                    </a>
                    @if(auth()->user()->role === 'admin')
                    <a href="{{ route('users.index') }}" class="px-6 py-3 bg-red-50 hover:bg-red-100 text-red-700 rounded-lg font-bold transition">
                        Manage Staff
                    </a>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>