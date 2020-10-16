<?php
// start session
session_start();
// $address = $_POST['address'];
// $first_name = $_POST['first_name'];
// $last_name = $_POST['last_name'];
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

    <h2>List of users:</h2>
    <?php

// loop through the session array with foreach
foreach ($_SESSION['users'] as $user['display_name']):{
    // and print out the values
    echo 'The user of $_SESSION is ' . "'" . $user['display_name'] . "'" . ' <br />';
}
?>


    <footer>
        <p style="text-align: center;">
            Copyright © 2020 emiDev Inc. All rights reserved.
        </p>
    </footer>
</body>

</html>