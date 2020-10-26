<?php
/**********************************************************
 * File: sign_in.php
 * Author: Emiliano Massai
 *
 * Description: Takes input posted from sign-up.php
 *   This file enters a new user into the database
 *   along with its associated username and password.
 *   The password is passed through password_hash()
 *   function to generate a hash of it, and sent that
 *   into the database.
 ***********************************************************/

// get data from the POST of sign-up.php new user form
$username = $_POST['username'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

echo 'Username: ' . $username . ' ';
echo 'Password: ' . $password . ' ';
echo 'Hashed Password: ' . $hashed_password;
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--Title in the browser title bar.-->
    <title>Sign-in</title>
    <!-- heading of the web page -->
</head>

</head>

<body>

    <?php
require "../Team_Activity_Log_in/connectHerokuDB.php";
$db = get_db();
try {
    // Add the user

    // We do this by preparing the query with placeholder values
    $query = 'INSERT INTO userDB (user_name, password) VALUES(:username, :password)';
    $statement = $db->prepare($query);

    // Now we bind the values to the placeholders. This does some nice things
    // including sanitizing the input with regard to sql commands.
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $hashed_password);

    $statement->execute();

} catch (Exception $ex) {
    // Please be aware that you don't want to output the Exception message in
    // a production environment
    echo "Error with DB. Details: $ex";
    die();
}

die(); // we always include a die after redirects. In this case, there would be no
?>





    <div>
        <a href="../../Week_7/Team_Activity_Log_in/sign_up.php" id="Sign-up">
            Add another user to the database
        </a>
    </div>
    <div>
        <a href="../../Home_Page/assignments.php" id="CS313_assignments_btn_id">
            Go to the CS313 Assignment's page
        </a>
    </div>

    <footer>
        <p style="text-align: center;">
            Copyright © <?php echo $today = date("Y"); ?> emiDev Inc. All rights reserved.
        </p>
    </footer>
</body>

</html>