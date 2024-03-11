<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehicles') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('vehicles.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Vehicle</a>
            </div>
            <div class="w-full overflow-hidden rounded-lg shadow-lg">
                @if ($vehicles->count())
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2">Photo</th>
                                <th class="px-4 py-2">Category</th>
                                <th class="px-4 py-2">Make</th>
                                <th class="px-4 py-2">Model</th>
                                 
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicles as $vehicle)
                                <tr class="text-center">
                                    <td class="border px-4 py-2">
                                        @if ($vehicle->photo)
                                            <img src="{{ asset(Storage::url($vehicle->photo)) }}" alt="{{ $vehicle->make }}" class="w-20 h-20 object-cover">
                                        @else
                                            <p class="text-gray-900">No picture</p>
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">{{ $vehicle->category->category }}</td>
                                    <td class="border px-4 py-2">{{ $vehicle->make }}</td>
                                    <td class="border px-4 py-2">{{ $vehicle->model }}</td>
                                    <td class="border px-4 py-2">{{ $vehicle->price }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('vehicles.show', $vehicle->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>
                                        <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No vehicles found.</p>
                @endif
    </div>
</x-app-layout>