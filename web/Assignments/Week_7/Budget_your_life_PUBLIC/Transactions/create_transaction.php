<?php
/**********************************************************
 * File: add_transaction.php
 * Author: Emiliano Massai
 *
 * Description: Takes input of a transaction and add it to an user.
 *   This file enters a new transaction into the database
 *   along with its associated date, amount, user_id, notes and category.
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
    <link rel="icon" type="image/ico" href="../Budget_your_life_PUBLIC/BudgetAppImages/budgetAppIcon.png">

    <script src="../javaScript.js"></script>

    <!--Title in the browser title bar.-->
    <title>Budget Your Life</title>
    <!-- heading of the web page -->
</head>

<body>

    <?php

// start session
session_start();
require "../connectAppDB.php";
$db = get_db();
$currentUserId = $_SESSION['current_user_id'];
$currentDisplayName = $_SESSION['current_display_name'];

$query = "SELECT display_name, user_name, password FROM budgetUser WHERE user_id=$currentUserId";
?>

    <h1>Ready to add a transaction, <?php echo $currentDisplayName ?>?</h1>
    <p>Please add all the following details:</p>

    <!-- use POST to link the current user to the new transaction and add it to the database -->
    <form class="newTransactionForm" name="newTransactionForm" action="../Transactions/add_transaction.php"
        method="post" \ onsubmit="return validateNewTransactionForm()">

        Transaction Type: <select name="type">
            <option value="Expense">Expense</option>
            <option value="Income">Income</option>
        </select>
        Amount: <input type="text" name="input_amount">
        Notes: <input type="text" name="input_notes">
        Category: <select name="category">
            <option value="Salary">Salary</option>
            <option value="Extra Income">Extra Income</option>
            <option value="Groceries">Groceries</option>
            <option value="Eating Out">Eating Out</option>
            <option value="Movies">Movies</option>
            <option value="Kids">Kids</option>
            <option value="Car">Car</option>
            <option value="Petrol">Petrol</option>
            <option value="Shopping">Shopping</option>
            <option value="Business">Business</option>
            <option value="Investments">Investments</option>
            <option value="Fitness">Fitness</option>
            <option value="Holidays">Holidays</option>
            <option value="Bills">Bills</option>
            <option value="Home">Home</option>
            <option value="Education">Education</option>
            <option value="Pets">Pets</option>
            <option value="Health">Health</option>
        </select>
        Date: <input type="date" name="dateTransaction">

        <br>
        <br>
        <p>NOTE: If you are using Safari, you will need to enter manually the date but if you use a Chromium based
            browser
            or Firefox, a date picker will be shown instead. The Safari doesn't support the date input yet.

        </p>

        <div class="bottomBar">
            <button type="submit" name="Add Transaction" id="addTransaction">Add Transaction</button>
        </div>
    </form>

    <?php

$count++;
?>



    <div>
        <a href="../budgetApp.php" id="CS313_assignments_btn_id">
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