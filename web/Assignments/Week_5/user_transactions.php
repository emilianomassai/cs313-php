<?php
// start session
session_start();

?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />

    <!--Title in the browser title bar.-->
    <title>CS:313 - Week 5</title>
    <!-- heading of the web page -->
</head>

<body>
    <h1>User transactions </h1>
    <p>The following is the list of all the transactions of the selected user:</p>

    <?php
try
{
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"], '/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo 'Error!: ' . $ex->getMessage();
    die();
}
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
                    <th style="padding:10px">Date</th>
                    <th style="padding:10px">Amount</th>
                    <th style="padding:10px">Notes</th>
                    <th style="padding:10px">Category</th>

                </tr>
            </thead>
            <tbody>


                <?php $transaction_count = 0;?>
                <?php foreach ($db->query('SELECT amount, user_id, notes, category, date FROM transaction') as $row) {
    $transactions_array[] = [
        'amount' => $row['amount'],
        'user_id' => $row['user_id'],
        'notes' => $row['notes'],
        'category' => $row['category'],
        'date' => $row['date'],
    ];
    $_SESSION['transactions'] = $transactions_array;

    if (($_POST["user_transaction"] == $transactions_array[$transaction_count]['user_id'])) {?>
                <tr>
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
    <h2>The total amount of all the transactions is: <?php echo '<br>' ?> <?php echo '$' . $totalAmount ?></h2>
    <br>


    <div>
        <a href="../Week_5/budgetApp.php" id="budget_app_home_btn_id">
            Go back to the budget app home page
        </a>
    </div>

    <footer>
        <p style="text-align: center;">
            Copyright © 2020 emiDev Inc. All rights reserved.
        </p>
    </footer>
</body>

</html>