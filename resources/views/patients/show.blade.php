<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Patient Details: {{ $patient->first_name }} {{ $patient->last_name }}
            </h2>
            <a href="{{ route('patients.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded text-sm font-bold">Back to List</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Basic Info -->
                    <div class="border-b md:border-b-0 md:border-r pb-4 md:pr-6">
                        <h3 class="text-lg font-bold text-blue-600 mb-4 uppercase">Personal Information</h3>
                        <p class="mb-2"><strong>Gender:</strong> {{ $patient->gender }}</p>
                        <p class="mb-2"><strong>Birth Date:</strong> {{ \Carbon\Carbon::parse($patient->birth_date)->format('M d, Y') }}</p>
                        <p class="mb-2"><strong>Contact:</strong> {{ $patient->contact_number }}</p>
                        <p class="mb-2"><strong>Address:</strong> {{ $patient->address }}</p>
                    </div>

                    <!-- Related Data (Eager Loaded) -->
                    <div>
                        <h3 class="text-lg font-bold text-blue-600 mb-4 uppercase">Medical Assignment</h3>
                        <p class="mb-2"><strong>Assigned Doctor:</strong> 
                            Dr. {{ $patient->doctor->first_name ?? '' }} {{ $patient->doctor->last_name ?? 'N/A' }} 
                            <span class="text-gray-500 text-sm">({{ $patient->doctor->specialization ?? 'General' }})</span>
                        </p>
                        
                        <h3 class="text-lg font-bold text-red-600 mt-6 mb-2 uppercase">Medical Record</h3>
                        @if($patient->medicalRecord)
                            <p class="mb-1"><strong>Blood Type:</strong> {{ $patient->medicalRecord->blood_type }}</p>
                            <p class="mb-1"><strong>Allergies:</strong> {{ $patient->medicalRecord->allergies }}</p>
                            <p class="mb-1"><strong>History:</strong> {{ $patient->medicalRecord->medical_history }}</p>
                        @else
                            <p class="text-gray-500 italic">No medical record found.</p>
                        @endif
                    </div>
                </div>

                <!-- Admin Actions Section -->
                @if(auth()->user()->role === 'admin')
                <div class="mt-10 pt-6 border-t flex gap-4">
                    <a href="{{ route('patients.edit', $patient) }}" class="bg-blue-600 text-white px-6 py-2 rounded font-bold">Edit Patient Info</a>
                    
                    <form action="{{ route('patients.destroy', $patient) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded font-bold" onclick="return confirm('Are you sure?')">Delete Patient</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>