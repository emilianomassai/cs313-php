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
    require "../connectAppDB.php";
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
            header("Location: ../budgetApp.php");
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
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../style.css" />

    <link rel="stylesheet" href="../javaScript.js" />
    <link rel="icon" type="image/ico" href="../BudgetAppImages/budgetAppIcon.png">
    <html>

    <head>
        <title>Budget Your Life - Sign In</title>
    </head>

<body>
    <div>
        <img src="../BudgetAppImages/budgetAppIcon.png" alt="budget App Picture" id="budgetAppPicture" width="300"
            height="300" />
    </div>
    <div>


        <h1>Please sign in below:</h1>
        <br>
        <?php
if ($badLogin) {
    echo "<h4 style='color:rgba(250, 98, 98, 0.713)'>Incorrect Username or password!</h4>\n";
}
?>

        <form id="mainForm" action="signIn.php" method="POST">


            <label for="txtUser">
                <h4> Username</h4>
            </label>
            <input type="text" id="txtUser" name="txtUser" placeholder="Username">

            <label for="txtPassword">
                <h4>Password</h4>
            </label>
            <input type="password" id="txtPassword" name="txtPassword" placeholder="Password">
            <br />
            <br />
            <br />
            <button type="submit"> Sign In </button>

        </form>


        <a href="signUp.php">Sign up - New Account</a>
    </div>


    <div>
        <a href="../../../Home_Page/assignments.php" id="CS313_assignments_btn_id">
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