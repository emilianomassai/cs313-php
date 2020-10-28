<?php
/**********************************************************
 * File: singup.php
 * Author: Br. Burton
 *
 * Description: Allows a user to enter a new username
 *   and password to add to the DB.
 *
 * It posts to a file called "createAccount.php"
 *   which does the actual creation.
 *
 ***********************************************************/
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
        <title>Budget Your Life - Sign Up</title>
    </head>

<body>
    <div>
        <img src="../BudgetAppImages/budgetAppIcon.png" alt="budget App Picture" id="budgetAppPicture" width="300"
            height="300" />
    </div>

    <div>

        <h1>Sign up for new account</h1>

        <form id="mainForm" action="createAccount.php" method="POST">

            <label for="display_name">Full Name</label>

            <input type="text" id="display_name" name="display_name" placeholder="Full Name">
            <br /><br />


            <label for="txtUser">
                <h4> Username</h4>
            </label>
            <input type="text" id="txtUser" name="txtUser" placeholder="Username">
            <br /><br />

            <input type="password" id="txtPassword" name="txtPassword" placeholder="Password"></input>
            <label for="txtPassword">
                <h4> Password </h4>
            </label>
            <br /><br />

            <input type="submit" value="Create Account" />

        </form>


    </div>

</body>

</html>