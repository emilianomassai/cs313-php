<?php
/**********************************************************
 * File: sign_in.php
 * Author: Emiliano Massai
 *
 * Description: Takes input posted from sign-up.php
 *   This file enters a new user into the database
 *   along with its associated user_name and password.
 *   The password is passed through password_hash()
 *   function to generate a hash of it, and sent that
 *   into the database.
 ***********************************************************/

session_start();

$badLogin = false;

// First check to see if we have post variables, if not, just
// continue on as always.

if (isset($_POST['txtUser']) && isset($_POST['txtPassword'])) {
    // they have submitted a user_name and password for us to check
    $user_name = $_POST['txtUser'];
    $password = $_POST['txtPassword'];

    // Connect to the DB
    require "connectAppDB.php";
    $db = get_db();

    $query = 'SELECT password FROM budgetUser WHERE user_name=:user_name';

    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $user_name);

    $result = $statement->execute();

    if ($result) {
        $row = $statement->fetch();
        $hashedPasswordFromDB = $row['password'];

        // now check to see if the hashed password matches
        if (password_verify($password, $hashedPasswordFromDB)) {
            // password was correct, put the user on the session, and redirect to home
            $_SESSION['user_name'] = $user_name;
            header("Location: budgetAppDB.php");
            die(); // we always include a die after redirects.
        } else {
            $badLogin = true;
        }

    } else {
        $badLogin = true;
    }
}

// If we get to this point without having redirected, then it means they
// should just see the login form.
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign In</title>
</head>

<body>
    <div>

        <?php
if ($badLogin) {
    echo "Incorrect user_name or password!<br /><br />\n";
}
?>

        <h1>Please sign in below:</h1>

        <form id="mainForm" action="signIn.php" method="POST">

            <input type="text" id="txtUser" name="txtUser" placeholder="user_name">
            <label for="txtUser">user_name</label>
            <br /><br />

            <input type="password" id="txtPassword" name="txtPassword" placeholder="Password">
            <label for="txtPassword">Password</label>
            <br /><br />

            <input type="submit" value="Sign In" />

        </form>

        <br /><br />

        Or <a href="signUp.php">Sign up</a> for a new account.

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