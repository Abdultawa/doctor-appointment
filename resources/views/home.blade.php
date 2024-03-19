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
                                events: {
                                    url: '/appointments', // Endpoint to fetch appointments
                                    method: 'GET',
                                    failure: function() {
                                        alert('There was an error while fetching appointments!');
                                    },
                                    color: 'blue', // Default color for fetched events
                                },
                                eventSources: [
                                    // Custom event source to filter out booked appointments
                                    function(fetchInfo, successCallback, failureCallback) {
                                        fetch('/appointments')
                                            .then(response => response.json())
                                            .then(appointments => {
                                                // Filter out booked appointments
                                                var filteredAppointments = appointments.filter(function(appointment) {
                                                    return appointment.status !== 'booked';
                                                });
                                                // Map the filtered appointments to FullCalendar event format
                                                // Call successCallback with the filtered events
                                                successCallback(calendarEvents);
                                            })
                                            .catch(error => {
                                                console.error('Error fetching appointments:', error);
                                                // Call failureCallback in case of error
                                                failureCallback(error);
                                            });
                                    }
                                ],
                                eventClick: function(info) {
                                    // Redirect to appointment details page
                                    var eventId = info.event.id; // Assuming you have an ID for each appointment
                                    window.location.href = '/appointment-details/' + eventId;
                                },
                                eventContent: function(info) {
                                    var startTime = info.event.extendedProps.start_time;
                                    var endTime = info.event.extendedProps.end_time;
                                    var timeHtml = '<div style="font-size: 12px; text-align: center">' + startTime + ' - ' + endTime + '</div>';
                                    return { html: timeHtml };
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
