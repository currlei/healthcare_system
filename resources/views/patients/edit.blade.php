<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Patient: {{ $patient->first_name }} {{ $patient->last_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('patients.update', $patient) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium text-sm text-gray-700">First Name</label>
                            <input type="text" name="first_name" value="{{ $patient->first_name }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Last Name</label>
                            <input type="text" name="last_name" value="{{ $patient->last_name }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Birth Date</label>
                            <input type="date" name="birth_date" value="{{ $patient->birth_date }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Gender</label>
                            <select name="gender" class="w-full border-gray-300 rounded-md shadow-sm">
                                <option value="Male" {{ $patient->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $patient->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Contact Number</label>
                            <input type="text" name="contact_number" value="{{ $patient->contact_number }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Change Doctor</label>
                            <select name="doctor_id" class="w-full border-gray-300 rounded-md shadow-sm">
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}" {{ $patient->doctor_id == $doctor->id ? 'selected' : '' }}>
                                        Dr. {{ $doctor->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700">Address</label>
                        <textarea name="address" class="w-full border-gray-300 rounded-md shadow-sm" required>{{ $patient->address }}</textarea>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded font-bold">Update Patient</button>
                        <a href="{{ route('patients.index') }}" class="ml-4 text-gray-600">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
