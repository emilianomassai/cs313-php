<?php
// start session
session_start();

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
    <h1>User details </h1>
    <p>The following is the list of all the details of the selected user:</p>

    <h6>
        <?php
try
{
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"], '/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo 'Error!: ' . $ex->getMessage();
    die();
}

$count = 0;
foreach ($db->query('SELECT display_name, user_name, user_id, password FROM budgetUser') as $row) {

    $users_array[] = [
        'display_name' => $row['display_name'],
        'user_name' => $row['user_name'],
        'user_id' => $row['user_id'],
        'password' => $row['password'],
    ];
    $_SESSION['users'] = $users_array;

    if ($_POST["userID"] == $users_array[$count]['user_id']) {

        echo 'Name: ' . $users_array[$count]['display_name'] . ';';
        echo '<br>';
        echo 'User ID: ' . $users_array[$count]['user_id'] . ';';
        echo '<br>';
        echo 'Username: ' . $users_array[$count]['user_name'] . ';';
        echo '<br>';
        echo 'Password: ' . $users_array[$count]['password'] . '.';
        echo '<br>';

    }
    $count++;
}
?>
    </h6>
    <br>


    <div>
        <a href="../Week_5/budgetApp.php" id="budget_app_home_btn_id">
            Go back to the budget app home page
        </a>
    </div>

    <footer>
        <p style="text-align: center;">
            Copyright © 2020 emiDev Inc. All rights reserved.
        </p>
    </footer>
</body>

</html>