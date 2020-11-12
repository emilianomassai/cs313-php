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
    <a href="../Week_3/Shopping_cart/Browse_Items.php" id="Shopping_cart_btn_id">
        Week 3: Shopping Cart
    </a>
    <a href="../Week_5/budgetApp.php" id="Budget_App_1.0_btn_id">
        Week 5: Budget Your Life - BETA 1.0 Project
    </a>

    </a>
    <a href="../Week_6/Team_Activity/topicEntry.php" id="enterScriptures_btn_id">
        Week 6: Team activity - Topic Entry
    </a>

    </a>
    <a href="../Week_6/Project_Budget_your_life/budgetApp.php" id="Budget_App_2.0_btn_id">
        Week 6: Budget Your Life - BETA 2.0 Project
    </a>

    <a href="../Week_7/Team_Activity_Log_in/signIn.php" id="sign_in_btn_id">
        Week 7: Team activity - Sign in
    </a>

    <a href="../Week_7/Budget_your_life_PUBLIC/Log_in_files/signIn.php" id="sign_in_btn_id">
        Week 7: Budget Your Life - PUBLIC RELEASE Project
    </a>

    <a href="../Week_9_Express/Team_activity/node-js-getting-started-main/public/form.html" id="express_btn_id">
        Week 9: Team Activity: Express.js Math operations <br>
        (NOTE: node index.js - Node app is running on port 5000)
    </a>

    <a href="../Week_9_Express/Postal_Rate_Calculator/node-js-getting-started/public/form.html" id="express_btn_id">
        Week 9: Postal Rate Calculator
    </a>

    <br>
    <div>
        <a href="../Home_Page/Emiliano_Home_Page.php" id="Emiliano_Home_Page_btn_id">
            Go to Emiliano's Homepage
        </a>
    </div>
    <!-- footer of the web page -->

    <footer>Copyright © <?php echo $today = date("Y"); ?> emiDev Inc. All rights reserved.</footer>
</body>

</html>