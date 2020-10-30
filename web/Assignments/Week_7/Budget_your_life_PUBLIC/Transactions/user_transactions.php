<?php
// start session
session_start();
if ($_SESSION['current_user_id'] == "") {
    session_unset();
    header("Location: ../Log_in_files/signIn.php");
}
require "../connectAppDB.php";
$db = get_db();

$currentUserId = $_SESSION['current_user_id'];
$currentDisplayName = $_SESSION['current_display_name'];
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
    <h1>📊 Transactions 📊</h1>
    <p><?php echo $currentDisplayName ?>, in this page you can see the list of all your transactions. Select one of them
        from the table below and click the "Modify Transaction" or "Delete Transaction" button.</p>


    <?php

?>

    <div class="container">
        <h2>Transactions List:</h2>
        <?php $totalAmount = 0;?>
        <table border="1" style="margin-left:auto;margin-right:auto" class="table table-bordered">
            <thead>
                <tr>
                    <th style="padding:10px">Amount</th>
                    <th style="padding:10px">Notes</th>
                    <th style="padding:10px">Category</th>
                    <th style="padding:10px">Date</th>
                    <th style="padding:10px">Select to edit</th>
                </tr>
            </thead>
            <tbody>


                <?php
$transaction_count = 0;

?>
                <?php foreach ($db->query('SELECT transaction_id, amount, user_id, notes, category, date FROM transaction ORDER BY
	date DESC') as $row) {
    $transactions_array[] = [
        'transaction_id' => $row['transaction_id'],
        'amount' => $row['amount'],
        'user_id' => $row['user_id'],
        'notes' => $row['notes'],
        'category' => $row['category'],
        'date' => $row['date'],
    ];
    $_SESSION['transactions'] = $transactions_array;

    if (($currentUserId == $transactions_array[$transaction_count]['user_id'])) {?>
                <tr>
                    <td style="padding:10px"><?php echo $transactions_array[$transaction_count]['amount'] ?>
                        <?php $totalAmount += $transactions_array[$transaction_count]['amount'];?>
                    </td>
                    <td style="padding:10px"><?php echo $transactions_array[$transaction_count]['notes'] ?>
                    </td>
                    <td style="padding:10px"><?php echo $transactions_array[$transaction_count]['category'] ?>
                    </td>
                    <td style="padding:10px"><?php echo $transactions_array[$transaction_count]['date'] ?>
                    </td>
                    <form class="editTransactionForm" name="editTransactionForm"
                        action="../Transactions/delete_transaction.php" method="post" \ onsubmit="return isSelected()">
                        <td style="text-align: center">
                            <input type="hidden" id="edit" name="edit" checked="true" value="">
                            <input type="radio" id="edit" name="edit"
                                value="<?php echo $transactions_array[$transaction_count]['transaction_id'] ?>">

                        </td>
                        <?php }?>


                </tr>
                <?php $transaction_count++;
}?>
            </tbody>
        </table>
    </div>
    <br>
    <h2>The total amount of all the transactions is: <?php echo '<br>' ?> <?php echo '$' . $totalAmount ?></h2>


    <?php if ($totalAmount == 0) {?>
    <h1 style="font-size:80px;">🧘🏼</h1>
    <h4>Your balance is quite flat!</h4>
    <?php } else if ($totalAmount < 0) {?>
    <h1 style="font-size:80px;">😰</h1>
    <h4>Remember not to spend more than you can earn!</h4>
    <?php } else if ($totalAmount > 0) {?>
    <h1 style="font-size:80px;">🎉</h1>
    <h4>Well done, you have some money earned!</h4>
    <?php }?>

    <br>
    <div class="bottomBar">

        <input style="width: 200px" type="submit" name="Modify Transaction" value="Modify Transaction"
            id="modifyTransaction" formaction="../Transactions/modify_transaction.php"> </input>
        <br>
        <br>
        <input style="width: 200px" type="submit" name="Delete Transaction" id="deleteTransaction"
            value="Delete Transaction">
        </input>
    </div>

    </form>
    <br>
    <div>
        <a href="../budgetApp.php">
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