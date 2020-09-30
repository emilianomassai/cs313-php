<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="./Home_Page_style.css" />

    <!-- heading of the web page -->
    <title>CS313 Assignments</title>
</head>

<body>
    <h1>CS313 Assignments</h1>
    <section id="time">
        <?php
//$today = date("F j, Y, g:i a");                 // March 10, 2001, 5:16 pm
//$today = date("m.d.y");                         // 03.10.01
//$today = date("j, n, Y");                       // 10, 3, 2001
//$today = date("Ymd");                           // 20010310
//$today = date('h-i-s, j-m-y, it is w Day');     // 05-16-18, 10-03-01, 1631 1618 6 Sat pm 01
//$today = date('\i\t \i\s \t\h\e jS \d\a\y.');   // it is the 10th day.
//$today = date("D M j G:i:s T Y");               // Sat Mar 10 17:16:18 MST 2001
//$today = date('H:m:s \m \i\s\ \m\o\n\t\h');     // 17:03:18 m is month
//$today = date("H:i:s");                         // 17:16:18

echo $today = date("D, j F Y | G:i");

// to get always the current time, refreshing every 30 seconds the page
header("refresh: 30;");

?>
    </section>
    <br>
    <a href="../Week_2/Click_Me.html" id="Click_Me_btn_id">
        Week 2: Click Me
    </a>
    <a href="../Week_3/Team_activity/Basic_form_handling_PHP.html" id="Team_activity_btn_id">
        Week 3: Team Activity
    </a>
    <a href="../Week_3/Shopping_cart/Browse_Items.html" id="Shopping_cart_btn_id">
        Week 3: Shopping Cart
    </a>
    <br>
    <div>
        <a href="../Home_Page/Emiliano_Home_Page.php" id="Emiliano_Home_Page_btn_id">
            Go to Emiliano's Homepage
        </a>
    </div>
    <!-- footer of the web page -->

    <footer>Copyright © 2020 emiDev Inc. All rights reserved.</footer>
</body>

</html>