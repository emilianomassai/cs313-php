<?php
/**********************************************************
 * File: delete_transaction.php
 * Author: Emiliano Massai
 *
 * Description: This file use the transaction ID to retrieve
 * all the information of a given transaction. The selected
 * transaction is then deleted.
 ***********************************************************/
// start session
session_start();
require "../Project_Budget_your_life/connectAppDB.php";
$db = get_db();
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/ico" href="./BudgetAppImages/budgetAppIcon.png">
    <script src="../Project_Budget_your_life/javaScript.js"></script>

    <!--Title in the browser title bar.-->
    <title>Budget Your Life</title>
    <!-- heading of the web page -->
</head>

<body>
    <h1>Delete Transaction </h1>
    <p>In this page you can review the selected transaction and then delete it. NOTE: The transaction will be removed
        PERMANENTLY from the database.
    </p>


    <form class="deleteTransaction" name="deleteTransaction" action="removed_transaction.php" method="post">
        <?php
$_SESSION['editTransactionSession'] = $_POST['edit'];

$editTransaction = $_POST['edit'];
$_SESSION['transactions'] = $sessionTransactions;
?>
        <h2>The following transaction will be deleted:</h2>

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
                        <td style="padding:10px"><?php echo $transactions_array[$transaction_count]['amount'] ?>
                        </td>
                        <td style="padding:10px"><?php echo $transactions_array[$transaction_count]['notes'] ?>
                        </td>
                        <td style="padding:10px"><?php echo $transactions_array[$transaction_count]['category'] ?>
                        </td>
                        <td style="padding:10px"><?php echo $transactions_array[$transaction_count]['date'] ?>
                        </td>

                        <?php }?>
                    </tr>
                    <?php $transaction_count++;
}?>
                </tbody>
            </table>

            <br>

            <div class="bottomBar">
                <button type="submit" name="Delete Transaction" id="deleteTransaction">Delete
                    Transaction</button>
            </div>

    </form>

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