<?php
/************************************************************
 * File: sign-up.php
 * Author: Emiliano Massai
 *
 * Description:
 * Sign-up page that asks for a username and password, and
 * then inserts this into the database.
 ***********************************************************/
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--Title in the browser title bar.-->
    <title>Sign-up</title>
    <!-- heading of the web page -->
</head>

</head>

<body>
    <h1>Please enter the following information:</h1>
    <br>


    <form class="newUserForm" name="newUserForm" action="sign_in.php" method="post"></form>

    <h4><label for="username_txt"> Username:</label> </h4>
    <input type="text" id="username" name="username">

    <h4><label for="password_txt"> Password:</label> </h4>
    <input type="text" id="password" name="password">


    <br>
    <br>

    <div class="bottomBar">
        <button type="submit" name="Add User" id="addUser">Add User</button>
    </div>

    </form>

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