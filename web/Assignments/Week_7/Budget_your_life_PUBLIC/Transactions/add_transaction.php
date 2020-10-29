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
    <link rel="icon" type="image/ico" href="../BudgetAppImages/budgetAppIcon.png">


    <!--Title in the browser title bar.-->
    <title>Budget Your Life</title>
    <!-- heading of the web page -->
</head>

<body>


    <?php
// start session
session_start();
if ($_SESSION['current_user_id'] == "") {
    session_unset();
    header("Location: ../Log_in_files/signIn.php");

}
require "../connectAppDB.php";
$db = get_db();
//Here I should have the user ID, transaction information passed with session

$currentUserId = $_SESSION['current_user_id'];
$currentDisplayName = $_SESSION['current_display_name'];

$category = $_POST['category'];
$amount = $_POST['input_amount'];
$notes = $_POST['input_notes'];
$date = $_POST['dateTransaction'];
$transactionType = $_POST['type'];
?>

    <h1>Thank you <?php echo $currentDisplayName ?>!</h1>

    <?php if ($transactionType == "Expense") {?>
    <h1 style="font-size:80px;">💸</h1>
    <h4>Bye bye, my dear friend!</h4>
    <?php } else if ($transactionType == "Income") {?>
    <h1 style="font-size:80px;">🕺🏻</h1>
    <h4>This feels good!</h4>
    <?php }?>

    <h2>The following transaction has been recorded:</h2>

    <?php

$query = 'INSERT INTO public.transaction(user_id, amount, notes, category, date) VALUES(:user_id, :amount, :notes, :category, :date)';
$statement = $db->prepare($query);

// Now we bind the values to the placeholders. This does some nice things
// including sanitizing the input with regard to sql commands.
$statement->bindValue(':user_id', $currentUserId);
if ($transactionType == "Expense") {
    $statement->bindValue(':amount', '-' . $amount);
} else {
    $statement->bindValue(':amount', $amount);
}

$statement->bindValue(':notes', $notes);
$statement->bindValue(':category', $category);
$statement->bindValue(':date', $date);

$statement->execute();

?>

    <div class="container">
        <table border="1" style="margin-left:auto;margin-right:auto" class="table table-bordered">
            <thead>
                <tr>
                    <th style="padding:10px">Amount</th>
                    <th style="padding:10px">Notes</th>
                    <th style="padding:10px">Category</th>
                    <th style="padding:10px">Date</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($db->query('SELECT transaction_id, amount, user_id, notes, category, date FROM transaction') as
    $row) {
    $transactions_array[] = [
        'transaction_id' => $row['transaction_id'],
        'amount' => $row['amount'],
        'user_id' => $row['user_id'],
        'notes' => $row['notes'],
        'category' => $row['category'],
        'date' => $row['date'],
    ];
    $_SESSION['transactions'] = $transactions_array;

    if (($_POST["edit"] == $transactions_array[$transaction_count]['transaction_id'])) {?>


                <tr>
                    <td style="padding:10px"><?php echo $amount ?>
                    </td>
                    <td style="padding:10px"><?php echo $notes ?>
                    </td>
                    <td style="padding:10px"><?php echo $category ?>
                    </td>
                    <td style="padding:10px"><?php echo $date ?>
                    </td>

                    <?php }?>
                </tr>
                <?php $transaction_count++;
}?>
            </tbody>
        </table>


        <br>
        <br>
        <a href="../Transactions/create_transaction.php">
            Add another transaction
        </a>

        <div>
            <a href="../Transactions/user_transactions.php" id="CS313_assignments_btn_id">
                See your balance again
            </a>
        </div>

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