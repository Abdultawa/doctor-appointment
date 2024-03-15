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
                    {{-- {{ __("You're logged in!") }} --}}
                    <div id="calendar"></div>
                    @push('scripts')
                    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
                    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
                    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
                    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
                    <script>

                    document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');

                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        eventClick: function(info) {
                        var eventObj = info.event;

                        if (eventObj.url) {
                            alert(
                            'Clicked ' + eventObj.title + '.\n' +
                            'Will open ' + eventObj.url + ' in a new tab'
                            );

                            window.open(eventObj.url);

                            info.jsEvent.preventDefault(); // prevents browser from following link in current tab.
                        } else {
                            alert('Clicked ' + eventObj.title);
                        }
                        },
                        initialDate: '2024-02-15',
                        events: [
                        {
                            title: 'simple event',
                            start: '2024-02-02'
                        },
                        {
                            title: 'event with URL',
                            url: 'https://www.google.com/',
                            start: '2024-02-03'
                        }
                        ]
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


