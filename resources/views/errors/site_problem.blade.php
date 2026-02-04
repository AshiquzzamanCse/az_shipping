<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Maintenance Mode</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Noto Sans', sans-serif;
            background: linear-gradient(135deg, #023154, #48C8FF);
            color: white;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 0 20px rgba(72, 200, 255, 0.5);
            text-align: center;
        }

        #timer {
            font-size: 6em;
            font-weight: 100;
            color: white;
            text-shadow: 0 0 20px #48C8FF;
        }

        #timer div {
            display: inline-block;
            min-width: 180px;
        }

        #timer div span {
            color: #999;
            display: block;
            font-size: .35em;
            font-weight: 400;
        }

        p {
            font-size: 2em;
            margin-bottom: 20px;
        }

        #target-date,
        #current-date {
            font-size: 1.5em;
            color: #ccc;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">

        <span>Come Back</span>
        <p>Site Maintenance Mode</p>

        <div id="timer"></div>
        <div id="message"></div>
        <div id="current-date"></div>

    </div>

    {{-- <script>
        function updateTimer() {
            const future = Date.parse("Nov 6, 2024 20:00:00");
            const now = new Date();
            const diff = future - now;

            if (diff <= 0) {
                document.getElementById("timer").innerHTML =
                    '<div>0<span>days</span></div><div>0<span>hours</span></div><div>0<span>minutes</span></div><div>0<span>seconds</span></div>';
                return;
            }

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const secs = Math.floor((diff % (1000 * 60)) / 1000);

            document.getElementById("timer").innerHTML =
                '<div>' + days + '<span>Days</span></div>' +
                '<div>' + hours + '<span>Hours</span></div>' +
                '<div>' + mins + '<span>Minutes</span></div>' +
                '<div>' + secs + '<span>Seconds</span></div>';
        }

        function updateCurrentDate() {
            const now = new Date();
            const options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                weekday: 'long'
            };
            document.getElementById("current-date").innerText = now.toLocaleDateString('en-US', options) +
                ', ' + now.toLocaleTimeString('en-US');
        }

        setInterval(updateTimer, 1000);
        updateTimer(); // Call once to initialize immediately
        updateCurrentDate(); // Call once to initialize current date
    </script> --}}

    <script>
        /* ===== SET TIME ONLY ON FIRST LOAD ===== */
        const DEFAULT_TIME = {
            days: 1,
            hours: 11,
            minutes: 52,
            seconds: 40
        };
        /* ===================================== */

        let totalSeconds;
        let interval;

        /* INIT */
        if (localStorage.getItem("countdownSeconds")) {
            totalSeconds = parseInt(localStorage.getItem("countdownSeconds"));
        } else {
            totalSeconds =
                DEFAULT_TIME.days * 86400 +
                DEFAULT_TIME.hours * 3600 +
                DEFAULT_TIME.minutes * 60 +
                DEFAULT_TIME.seconds;

            localStorage.setItem("countdownSeconds", totalSeconds);
        }

        function updateTimer() {
            if (totalSeconds <= 0) {
                clearInterval(interval);
                localStorage.removeItem("countdownSeconds");

                document.getElementById("timer").innerHTML =
                    `<div>0<span>Days</span></div>
             <div>0<span>Hours</span></div>
             <div>0<span>Minutes</span></div>
             <div>0<span>Seconds</span></div>`;

                document.getElementById("message").innerText =
                    "Please wait for site launch 🚀";
                return;
            }

            const d = Math.floor(totalSeconds / 86400);
            const h = Math.floor((totalSeconds % 86400) / 3600);
            const m = Math.floor((totalSeconds % 3600) / 60);
            const s = totalSeconds % 60;

            document.getElementById("timer").innerHTML =
                `<div>${d}<span>Days</span></div>
         <div>${h}<span>Hours</span></div>
         <div>${m}<span>Minutes</span></div>
         <div>${s}<span>Seconds</span></div>`;

            totalSeconds--;
            localStorage.setItem("countdownSeconds", totalSeconds);
        }

        /* CURRENT DATE */
        function updateCurrentDate() {
            const now = new Date();
            document.getElementById("current-date").innerText =
                now.toLocaleDateString('en-US', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                }) + ' , ' + now.toLocaleTimeString('en-US');
        }

        /* AUTO START */
        updateTimer();
        interval = setInterval(updateTimer, 1000);
        setInterval(updateCurrentDate, 1000);
        updateCurrentDate();
    </script>


</body>

</html>
