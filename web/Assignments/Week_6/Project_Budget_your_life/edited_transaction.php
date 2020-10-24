<?php
/**********************************************************
 * File: edited_transaction.php
 * Author: Emiliano Massai
 *
 * Description: Modify an existing transaction with the new information.
 * It uses the transaction ID to find which transaction has to be modified.
 * ***********************************************************/
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/ico" href="../Project_Budget_your_life/BudgetAppImages/budgetAppIcon.png">


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
//Here I should have the user ID, transaction information passed with session

$actualUserId = $_SESSION["sessionUserID"];
$actualUserDisplayName = $_SESSION["sessionUserDisplayName"];
$category = $_POST['category'];
$amount = $_POST['input_amount'];
$notes = $_POST['input_notes'];
$date = $_POST['dateTransaction'];
$transactionType = $_POST['type'];
?>

    <h1>Your transaction has been edited.</h1>

    <?php
$editTransaction = $_SESSION['editTransactionSession'];

echo $category;
echo $amount;
echo $notes;
echo $date;
echo $editTransaction;

//$query = "DELETE FROM transaction WHERE transaction_id = $editTransaction";

$query = "UPDATE transaction SET (amount = $amount, notes = $notes, category = $category, date = $date) WHERE transaction_id = $editTransaction";
$statement = $db->prepare($query);
$statement->execute();

?>

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