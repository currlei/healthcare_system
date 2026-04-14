<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                Medication Details
            </h2>
            <a href="{{ route('medications.index') }}" class="text-sm font-bold text-blue-600 hover:underline">← Back to Inventory</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl p-8 border border-gray-100 text-center">
                <div class="inline-block p-4 bg-indigo-100 rounded-full text-indigo-600 mb-4">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                </div>
                
                <h1 class="text-3xl font-black text-gray-900 mb-2">{{ $medication->name }}</h1>
                <span class="px-4 py-1 bg-green-100 text-green-700 rounded-full font-bold text-sm uppercase">{{ $medication->dosage }}</span>
                
                <div class="mt-8 pt-8 border-t border-gray-100 text-left">
                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Clinical Description</h4>
                    <p class="text-gray-600 leading-relaxed">{{ $medication->description }}</p>
                </div>

                @if(auth()->user()->role === 'admin')
                <div class="mt-10 flex justify-center gap-4">
                    <a href="{{ route('medications.edit', $medication) }}" class="bg-indigo-600 text-white px-8 py-3 rounded-lg font-bold shadow-lg">Edit Info</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>