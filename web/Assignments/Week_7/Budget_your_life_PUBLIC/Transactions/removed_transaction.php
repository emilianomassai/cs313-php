<?php
/**********************************************************
 * File: removed_transaction.php
 * Author: Emiliano Massai
 *
 * Description: Remove an existing transaction from the database.
 * It uses the transaction ID to find which transaction has to be deleted.
 * ***********************************************************/
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

    <h1>Thank you!<br>
        Your transaction has been deleted.
    </h1>
    <h4>Hopefully you deleted it on purpose!</h4>
    <br>
    <h1>🙈 🙉 🙊</h1>
    <?php
$editTransaction = $_SESSION['editTransactionSession'];

$query = "DELETE FROM transaction WHERE transaction_id = $editTransaction";

$statement = $db->prepare($query);
$statement->execute();

?>

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