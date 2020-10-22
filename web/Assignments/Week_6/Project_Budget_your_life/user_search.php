<?php
// start session
session_start();
require "../Project_Budget_your_life/connectAppDB.php";
$db = get_db();
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/ico" href="./BudgetAppImages/budgetAppIcon.png">
    <!--Title in the browser title bar.-->
    <title>Budget Your Life</title>
    <!-- heading of the web page -->
</head>

<body>
    <h1>User list </h1>

    <?php
$count = 0;
$isUser = false;
foreach ($db->query('SELECT display_name, user_name, user_id, password FROM budgetUser') as $row) {

    $users_array[] = [
        'display_name' => $row['display_name'],

    ];
    $_SESSION['users'] = $users_array;

    if ($_POST["name_user"] == $users_array[$count]['display_name']) {

        echo 'We found one user in our database corresponding to ' . $users_array[$count]['display_name'] . '.';
        $isUser = true;
        echo '<br>';
        echo '<br>';
        echo '<br>';

    }
    $count++;

}

if ($isUser == false) {
    echo 'No user found in our database. Please try again!';
    echo '<br>';
    echo '<br>';
    echo '<br>';

}
?>


    <br>


    <div>
        <a href="../Project_Budget_your_life/budgetApp.php" id="CS313_assignments_btn_id">
            Go back to the App Homepage
        </a>
    </div>

    <footer>
        <p style="text-align: center;">
            Copyright © <?php echo $today = date("Y"); ?> emiDev Inc. All rights reserved.
        </p>
    </footer>
</body>

</html>