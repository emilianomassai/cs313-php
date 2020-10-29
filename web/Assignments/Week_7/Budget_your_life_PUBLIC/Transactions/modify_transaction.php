<?php
/**********************************************************
 * File: modify_transaction.php
 * Author: Emiliano Massai
 *
 * Description: This file use the transaction ID to retrieve
 * all the information of a given transaction. The user can
 * then modify or delete the transaction.
 ***********************************************************/
// start session
session_start();
if ($_SESSION['current_user_id'] == "") {
    session_unset();
    header("Location: ../Log_in_files/signIn.php");

}
require "../connectAppDB.php";
$db = get_db();
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="icon" type="image/ico" href="../BudgetAppImages/budgetAppIcon.png">
    <script src="../javaScript.js"></script>

    <!--Title in the browser title bar.-->
    <title>Budget Your Life</title>
    <!-- heading of the web page -->
</head>

<body>
    <h1>Modify Transaction </h1>
    <p>In this page you can update the information of the selected transaction.</p>

    <?php
$_SESSION['editTransactionSession'] = $_POST['edit'];

$editTransaction = $_POST['edit'];
$_SESSION['transactions'] = $sessionTransactions;

foreach ($db->query('SELECT transaction_id, amount, user_id, notes, category, date FROM transaction') as $row) {
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

    <form class="newTransactionForm" name="newTransactionForm" action="../Transactions/edited_transaction.php"
        method="post" \ onsubmit="return validateNewTransactionForm()">

        Transaction Type: <select name="type">
            <option value="Expense">Expense</option>
            <option value="Income">Income</option>
        </select>
        Amount: <input type="text" name="input_amount"
            value="<?php echo $transactions_array[$transaction_count]['amount'] ?>">
        Notes: <input type="text" name="input_notes"
            value="<?php echo $transactions_array[$transaction_count]['notes'] ?>">
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
        Date: <input type="date" name="dateTransaction"
            value="<?php echo $transactions_array[$transaction_count]['date'] ?>">

        <br>
        <br>
        <p>NOTE: If you are using Safari, you will need to enter manually the date but if you use a Chromium based
            browser
            or Firefox, a date picker will be shown instead. The Safari doesn't support the date input yet.

        </p>

        <div class="bottomBar">
            <button type="submit" name="Update Transaction" id="updateTransaction">Update Transaction</button>
        </div>
    </form>

    <?php }?>

    <?php $transaction_count++;
}?>



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