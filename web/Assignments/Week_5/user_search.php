<?php
// start session
session_start();

?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />

    <!--Title in the browser title bar.-->
    <title>CS:313 - Week 5</title>
    <!-- heading of the web page -->
</head>

<body>
    <h1>User search </h1>
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
if (isset($_POST["name_user"])) {
    echo "Variable 'a' is set.<br>";

    foreach ($db->query('SELECT display_name, user_name, user_id, password FROM budgetUser') as $row) {

        $users_array[] = [
            'display_name' => $row['display_name'],
            'user_name' => $row['user_name'],
            'user_id' => $row['user_id'],
            'password' => $row['password'],
        ];
        $_SESSION['users'] = $users_array;

        if ($_POST["name_user"] == $users_array[$count]['display_name']) {

            echo 'We have found ' . $users_array[$count]['display_name'] . ' in our database!';

            echo '<br>';

        } else {
            echo 'Sorry, we cant find any user with that name. Please try again!';
        }
        $count++;
    }
}
?>
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