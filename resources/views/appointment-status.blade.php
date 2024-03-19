<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointment Status') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Appointment Details</h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Time</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End Time</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Loop through appointments to display each one -->
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $appointment->date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $appointment->start_time }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $appointment->end_time }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $appointment->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('error'))
                        <div x-data="{ show: true }"
                            x-init="setTimeout(() => show = false, 4000)"
                            x-show="show"
                            class="fixed bg-red-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
                        >
                            <p>{{ session('error') }}</p>
                        </div>
                    @elseif (session()->has('success'))
                        <div x-data="{ show: true }"
                            x-init="setTimeout(() => show = false, 4000)"
                            x-show="show"
                            class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
                        >
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
</x-app-layout>
