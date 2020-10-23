<?php
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

    <!--Title in the browser title bar.-->
    <title>Budget Your Life</title>
    <!-- heading of the web page -->
</head>

<body>
    <h1>User transactions </h1>
    <p>The following is the list of all the transactions of the selected user:</p>

    <?php

$count = 0;
foreach ($db->query('SELECT display_name, user_name, user_id, password FROM budgetUser') as $row) {

    $users_array[] = [
        'display_name' => $row['display_name'],
        'user_name' => $row['user_name'],
        'user_id' => $row['user_id'],
        'password' => $row['password'],
    ];
    $_SESSION['users'] = $users_array;
    $count++;
}

?>

    <div class="container">
        <h2>Transactions List:</h2>
        <?php $totalAmount = 0;?>
        <table border="1" style="margin-left:auto;margin-right:auto" class="table table-bordered">
            <thead>
                <tr>
                    <th style="padding:10px">Transaction ID</th>
                    <th style="padding:10px">Amount</th>
                    <th style="padding:10px">Notes</th>
                    <th style="padding:10px">Category</th>
                    <th style="padding:10px">Date</th>

                </tr>
            </thead>
            <tbody>


                <?php $transaction_count = 0;?>
                <?php foreach ($db->query('SELECT transaction_id, amount, user_id, notes, category, date FROM transaction') as $row) {
    $transactions_array[] = [
        'transaction_id' => $row['transaction_id'],
        'amount' => $row['amount'],
        'user_id' => $row['user_id'],
        'notes' => $row['notes'],
        'category' => $row['category'],
        'date' => $row['date'],
    ];
    $_SESSION['transactions'] = $transactions_array;

    if (($_POST["user_transaction"] == $transactions_array[$transaction_count]['user_id'])) {?>
                <tr>
                    <td style="padding:10px"><?php echo $transactions_array[$transaction_count]['transaction_id'] ?>
                    <td style="padding:10px"><?php echo $transactions_array[$transaction_count]['amount'] ?>
                        <?php $totalAmount += $transactions_array[$transaction_count]['amount'];?>
                    </td>
                    <td style="padding:10px"><?php echo $transactions_array[$transaction_count]['notes'] ?>
                    </td>
                    <td style="padding:10px"><?php echo $transactions_array[$transaction_count]['category'] ?>
                    </td>
                    <td style="padding:10px"><?php echo $transactions_array[$transaction_count]['date'] ?>
                        <?php }?>
                </tr>
                <?php $transaction_count++;
}?>
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <br>

    <h2>The total amount of all the transactions is: <?php echo '<br>' ?> <?php echo '$' . $totalAmount ?></h2>
    <br>

    <div class="container">
        <h2>Transactions List:</h2>


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