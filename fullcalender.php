<html>


<head>
    <title>Fullcalendar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
</head>


<body>
    <h2>
        <center>Javascript Fullcalendar</center>
    </h2>
    <div class="container">
        <div id="calendar"></div>
    </div>
    <br>
    <!-- Button trigger modal -->
    <button type="button" class="d-none" id="event_btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="event_title" id="event_title" class="form-control"
                        placeholder="Event title">
                    <input type="hidden" name="event_id" id="event_id" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="addEvent()" class="btn btn-primary">Add event</button>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
<script>
    var calendar;
    var G_start;
    var G_event;


    var myEvents = [{
            id: 1,
            title: 'Long Event',
            start: '2024-12-11', // yyyy-mm-dd
            end: '2024-12-11', // yyyy-mm-dd
        },
        {
            id: 2,
            title: 'Long Event',
            start: '2024-12-12', // yyyy-mm-dd
            end: '2024-12-12', // yyyy-mm-dd
        },


    ];


    function addEvent() {
        var event_title = document.getElementById('event_title').value;
        var event_id = document.getElementById('event_id').value;
        let date = '';

        if (event_id) {
            console.log('event_id', G_event.id);

            G_event.title = event_title;
            $('#calendar').fullCalendar('updateEvent', G_event);

            G_event = null;


        } else {

            date = G_start.format('YYYY-MM-DD');
            myEvents.push({
                id: Math.floor(Math.random() * 1000), // call api get id
                title: event_title,
                start: date, // yyyy-mm-dd
                end: G_start.format('YYYY-MM-DD'), // yyyy-mm-dd
            });

            calendar.fullCalendar('renderEvent', {
                    id: Math.floor(Math.random() * 1000), // call api get id
                    title: event_title,
                    start: G_start.format('YYYY-MM-DD'), // yyyy-mm-dd
                    end: G_start.format('YYYY-MM-DD'), // yyyy-mm-dd
                    // allDay: allDay
                },
                true // make the event "stick"
            );

            G_start = null;

        }


        document.getElementById('event_title').value = '';
        document.getElementById('event_id').value = '';


    }


    $(document).ready(function() {
        calendarView();
    });


    function calendarView() {
        calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next', // Add the built-in prev and next buttons
                center: 'title',
                right: 'year', // You can also add a dropdown to navigate by year (optional)

            },
            defaultView: 'month', // Default view when the calendar loads
            defaultDate: moment().format('YYYY-MM-DD'), // Set today's date as default
            header: {
                left: 'prev,next today',
                center: 'title',
                right: ''
            },

            // validRange: {
            //     start: moment().format('YYYY-MM-DD')
            // },
            selectable: true,
            // Disable Sunday (index 0) and the 2nd and 4th Saturdays (indexes 6 and 5)
            // hiddenDays: [0], //not display Sunday (index 0)
            // Highlight Sundays and the 2nd and 4th Saturdays, and display "Week Off"
            dayRender: function(date, cell) {
                const dayOfWeek = date.day(); // Get the day of the week (0: Sunday, 6: Saturday)
                const weekOfMonth = Math.ceil(date.date() / 7); // Calculate the week of the month

                // Display "Week Off" on Sundays and the 2nd and 4th Saturdays
                if (dayOfWeek === 0 || (dayOfWeek === 6 && (weekOfMonth === 2 || weekOfMonth === 4)) ||
                    (dayOfWeek === 5 && (weekOfMonth === 2 || weekOfMonth === 4))) {
                    cell.append('<div class="week-off">Week Off</div>');
                    cell.css('background-color', '#f0f0f0'); // Light grey background
                    cell.css('color', '#888'); // Light grey text
                }
            },
            eventClick: function(calEvent, jsEvent, view) {
                console.log(document.querySelector('.fc-center h2').innerHTML)
                document.getElementById('event_title').value = calEvent.title;
                document.getElementById('event_id').value = calEvent.id;
                G_event = calEvent;

                document.getElementById('event_btn').click();


            },
            select: function(start, end, allDay) {
                G_start = start;

                // Prevent selection on Sunday and 2nd/4th Saturday
                if (start.day() === 0 || (start.day() === 6 && (Math.ceil(start.date() / 7) === 2 || Math.ceil(start.date() / 7) === 4))) {
                    alert("This day is off (Sunday, 2nd or 4th Saturday).");
                    calendar.fullCalendar('unselect');
                } else {
                    document.getElementById('event_btn').click();
                }
                calendar.fullCalendar('unselect');
            },


            events: myEvents,


        });


        $('.fc-button-prev').click(function() {

            calendar.fullCalendar('renderEvent', {
                title: 'New',
                start: "2013-09-09 10:30"
            });


        });
    }
</script>

<style>
    .week-off {
        font-size: 12px;
        font-weight: bold;
        text-align: center;
        margin-top: 5px;
        color: #ff0000;
        /* Red color for "Week Off" */
    }
</style>