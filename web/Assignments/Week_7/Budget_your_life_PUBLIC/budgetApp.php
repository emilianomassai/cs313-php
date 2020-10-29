<?php
/**********************************************************
 * File: budgetApp.php
 * Author: Emiliano Massai
 *
 * Description: This is the PHP file that the user starts with.
 *   It has different sections which are useful to check different
 *   information. Each section is linked to another page.
 ***********************************************************/

// start session
session_start();
if ($badLogin = true) {
    session_unset();
    header("Location: ../Budget_your_life_PUBLIC/Log_in_files/signIn.php");
} else {
// The DB connection logic is in another file so it can be included
    // in each of our different PHP files.
    require "../Budget_your_life_PUBLIC/connectAppDB.php";
    $db = get_db();
    ?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/ico" href="../Budget_your_life_PUBLIC/BudgetAppImages/budgetAppIcon.png">

    <script src="../Budget_your_life_PUBLIC/javaScript.js"></script>

    <!--Title in the browser title bar.-->
    <title>Budget Your Life</title>
</head>

<body>


    <div>
        <img src="../Budget_your_life_PUBLIC/BudgetAppImages/budgetAppIcon.png" alt="budget App Picture"
            id="budgetAppPicture" width="300" height="300" />
    </div>
    <h1>Budget Your Life </h1>
    <?php echo "This is the current user's ID: " . $_SESSION['current_user_id']; ?>

    <p>Welcome to this budget app! In this page you can see different ways to retrieve information from our database
        about our users. Please choose one option and read the description for more details:</p>
    <div class="container">

        <!-- A list of all users in the database, each one is a link that leads to a user details page.  -->

        <h4>Spent some money? Got some cash? Record you transaction here!</h4>

        <a href="../Budget_your_life_PUBLIC/Transactions/create_transaction.php">
            <h2>💰 Add a transaction 💰</h2>
        </a>


    </div>

    <br>
    <hr>


    <!-- A simple form that allows for a last name to be entered, then the user list will be shown for all users that match the last name.
    <h2>User search:</h2>
    <form class="userSearch" name="userSearch" action="../Project_Budget_your_life/user_search.php" method="post" \
        onsubmit="return validateForm()">

        <h4>Please enter the name of the user you are looking for:</h4>

        <input placeholder="e.g.: Emiliano Massai" type="text" name="name_user" id="nameUser">
        <br />
        <div class="bottomBar">
            <button type="submit" name="search" id="searchUser">Search</button>
        </div>

    </form>
    <br>
    <hr> -->

    <!-- A view of a single user, showing all the  income, expenses, notes, category of the transaction, date of the transaction etc.  -->
    <h4>Thinking about your next car or going on holiday? Make sure you have enough founds!</h4>

    <a href="../Budget_your_life_PUBLIC/Transactions/user_transactions.php">
        <h2>🏝 Check your balance 🏝</h2>
    </a>


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

<?php }?>