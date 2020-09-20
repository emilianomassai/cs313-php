<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="./Home_Page_style.css" />

    <!-- heading of the web page -->
    <title>Emiliano Massai's Home Page</title>
</head>

<body>
    <h1>Welcome to Emiliano Massai's Home Page</h1>

    <div>
        <?php
//$today = date("F j, Y, g:i a");                 // March 10, 2001, 5:16 pm
//$today = date("m.d.y");                         // 03.10.01
//$today = date("j, n, Y");                       // 10, 3, 2001
//$today = date("Ymd");                           // 20010310
//$today = date('h-i-s, j-m-y, it is w Day');     // 05-16-18, 10-03-01, 1631 1618 6 Satpm01
//$today = date('\i\t \i\s \t\h\e jS \d\a\y.');   // it is the 10th day.
//$today = date("D M j G:i:s T Y");               // Sat Mar 10 17:16:18 MST 2001
//$today = date('H:m:s \m \i\s\ \m\o\n\t\h');     // 17:03:18 m is month
//$today = date("H:i:s");                         // 17:16:18

echo $today = date("D, j F Y | G:i");
?>
    </div>
    <br>

    <div>
        <img src="../Home_Page/images/me.jpg" alt="Emiliano's Profile
                Picture" id="myPhoto" />
    </div>

    <h2>Emiliano Massai</h2>
    <i> Software Engineering Major </i>
    <br />
    <br />
    <p>
        Hi there! <br />
        Welcome to my home page. I'm Emiliano and I'm from Italy. I lived in
        Bolivia for my last 5 years with my wife (she is from there) and my little
        daughter of 5, and I had a small catering in which I was making pizzas for
        the colleges of this city. Unfortunately, due to COVID-19, all the
        colleges closed for long time and I had no costumers left. For this
        reason, after praying asking for guidance, we decided to go back to the
        U.K. as I used to work there as chef in 5 stars Hotels. I already found a
        job and I moved the 17th of September. My wife and my daughter will get
        there later, as I will need time to look for a car and a place to stay.
        Right now I'm living at the staff accommodation of the hotel. I have been
        surprised to discover that as staff I'm allowed to use all the facilities
        of this hotel such as gym, swimming pool, golf course, tennis court, clay
        pigeon shooting and a lake for fishing. That is very nice! Can't wait to
        learn more about web engineering!
        <br />
    </p>

    <h2>Here are some pictures of the hotel where I'm working:</h2>
    <br />

    <div>
        <img src="../Home_Page/images/front.jpg" alt="Hotel_front" id="hotelFront" />
    </div>

    <div>
        <img src="../Home_Page/images/room.jpg" alt="Hotel_room" id="hotelRoom" />
        <img src="../Home_Page/images/swimming_pool.jpg" alt="Hotel_swimming_pool" id="hotelSwimmingPool" />
    </div>

    <br />
    <br />
    <div>
        <a href="../Home_Page/assignments.html" id="CS313_assignments_btn_id">
            Go to the CS313 Assignment's page
        </a>
    </div>

    <!-- footer of the web page -->

    <footer>Copyright © 2020 emiDev Inc. All rights reserved.</footer>
</body>

</html>