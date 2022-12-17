var date = "{{$event_date}} {{$time}}";
        $(document).ready(function() {

            function makeTimer() {

                // var endTime = new Date("11 November 2022 15:16:00 GMT+05:30");	
              // var endTime = new Date("11 November 2022 15:16:00");	
                var endTime = new Date(date);
                endTime = (Date.parse(endTime) / 1000);
                console.log(date);
                var now = new Date();
                now = (Date.parse(now) / 1000);

                var timeLeft = endTime - now;

                var days = Math.floor(timeLeft / 86400);
                var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
                var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

                if (hours < "10") {
                    hours = "0" + hours;
                }
                if (minutes < "10") {
                    minutes = "0" + minutes;
                }
                if (seconds < "10") {
                    seconds = "0" + seconds;
                }
                if ( days < 0 || ( hours == 0 && minutes  == 0 && seconds == 0 ) ) {
                    $("#days").html("0" + "<span>Days</span>");
                    $("#hours").html("00" + "<span>Hours</span>");
                    $("#minutes").html("00" + "<span>Minutes</span>");
                    $("#seconds").html("00" + "<span>Seconds</span>");
                } else {
                    
                    $("#days").html(days + "<span>Days</span>");
                    $("#hours").html(hours + "<span>Hours</span>");
                    $("#minutes").html(minutes + "<span>Minutes</span>");
                    $("#seconds").html(seconds + "<span>Seconds</span>");
                }

            }

            setInterval(function() {
                makeTimer();
            }, 1000);

        });
