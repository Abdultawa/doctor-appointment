<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="calendar"></div>
                    @push('scripts')
                    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var calendarEl = document.getElementById('calendar');
                            var calendar = new FullCalendar.Calendar(calendarEl, {
                                initialView: 'dayGridMonth',
                                dateClick: function(info) {
                                    var dateStr = info.dateStr;
                                    var eventName = prompt('Enter event name for ' + dateStr);
                                    if (eventName) {
                                        calendar.addEvent({
                                            title: eventName,
                                            start: dateStr,
                                            allDay: true
                                        });
                                    }
                                },
                                eventClick: function(info) {
                                    alert('Event: ' + info.event.title + '\nStart: ' + info.event.start);
                                }
                            });
                            calendar.render();
                        });
                    </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
