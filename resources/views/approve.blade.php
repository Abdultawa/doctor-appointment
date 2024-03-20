<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="container mx-auto py-8">
            <h1 class="text-2xl font-bold mb-4">Booked Appointments</h1>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Start Time</th>
                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">End Time</th>
                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 bg-gray-200"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($bookedAppointments as $appointment)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $appointment->user->name }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $appointment->date }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $appointment->start_time }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $appointment->end_time }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $appointment->status }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            @if ($appointment->status == 'booked')
                                <form method="POST" action="{{ route('appointment.approve', $appointment->id) }}">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Approve</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
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
