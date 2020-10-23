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
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/ico" href="../Project_Budget_your_life/BudgetAppImages/budgetAppIcon.png">

    <script src="../Project_Budget_your_life/javaScript.js"></script>

    <!--Title in the browser title bar.-->
    <title>Budget Your Life</title>
    <!-- heading of the web page -->
</head>

<body>

    <?php

// start session
session_start();
require "../Project_Budget_your_life/connectAppDB.php";
$db = get_db();

$count = 0;
foreach ($db->query('SELECT display_name, user_name, user_id, password FROM budgetUser') as $row) {

    $users_array[] = [
        // used to display a customized message
        'display_name' => $row['display_name'],
        'user_name' => $row['user_name'],
        // used to link the transaction to the correct user

        'user_id' => $row['user_id'],
        // STRETCH CHALLENGE - used to add the transaction only if the user enter a correct password

        'password' => $row['password'],
    ];
    $_SESSION['users'] = $users_array;

    // Here I should have a form with all the transaction information such as:

// user_id
    // amount
    // notes
    // category
    // date (try to add dynamic date with PHP)

    if ($_POST["userID"] == $users_array[$count]['user_id']) {
        $_SESSION["sessionUserID"] = $_POST["userID"];
        $_SESSION["sessionUserDisplayName"] =
            $users_array[$count]["display_name"];?>


    <?php echo 'User ID: ' . $_SESSION["sessionUserID"] . ';';
        echo 'category: ' . $category . ';';
        echo 'amount: ' . $amount . ';';
        echo 'notes: ' . $notes . ';';
        echo 'date: ' . $date . ';';

        ?>


    <h1>Ready to add a transaction, <?php echo $users_array[$count]['display_name'] ?>?</h1>
    <p>Please add all the following details:</p>

    <!-- use POST to link the current user to the new transaction and add it to the database -->
    <form class="newTransactionForm" name="newTransactionForm" action="add_transaction.php" method="post" \
        onsubmit="return validateNewTransactionForm()">
        <input type="hidden" name="input_user_id" value="<?php $_POST["userID"]?>">
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
            <option value="Fitness">Fitness</option>
            <option value="Holidays">Holidays</option>
            <option value="Bills">Bills</option>
            <option value="Home">Home</option>
            <option value="Education">Education</option>
            <option value="Pets">Pets</option>
            <option value="Health">Health</option>
        </select>
        Date: <input type="date" name="dateTransaction">


        <div class="bottomBar">
            <button type="submit" name="Add Transaction" id="addTransaction">Add Transaction</button>
        </div>
    </form>

    <?php
}
    $count++;
}
?>
    <p>NOTE: If you are using Safari, you will need to enter manually the date but if you use a Chromium based browser
        or Firefox, a date picker will be shown instead. The Safari doesn't support the date input yet.

    </p>


    <div>
        <a href="../Project_Budget_your_life/budgetApp.php" id="CS313_assignments_btn_id">
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