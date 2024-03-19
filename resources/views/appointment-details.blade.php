<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointment Details') }}
        </h2>
    </x-slot>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Start Time
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    End Time
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $appointment->date }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $appointment->start_time }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $appointment->end_time }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <form action="{{ route('appointment.book', $appointment->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <button type="submit" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Book Appointment
                        </button>
                    </form>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
