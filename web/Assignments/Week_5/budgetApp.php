<?php
// start session
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

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

echo "<br>";

foreach ($db->query('SELECT display_name, user_name, user_id, password FROM budgetUser') as $row) {

    $users[] = [
        'display_name' => $row['display_name'],
        'user_name' => $row['user_name'],
        'user_id' => $row['user_id'],
        'password' => $row['password'],
    ];

}

foreach ($db->query('SELECT amount, user_id, notes, category, date FROM transaction') as $row) {
    $transactions[] = [
        'amount' => $row['amount'],
        'user_id' => $row['user_id'],
        'notes' => $row['notes'],
        'category' => $row['category'],
    ];

}
echo '<br />';

?>

    <h1>Project Title: Budget App </h1>
    <br>
    <h2>List of all the users of the app:</h2>
    <div class="container">
        <h2>User List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['user_id']) ?>
                    </td>
                    <td><?php echo htmlspecialchars($user['display_name']) ?>
                    </td>
                    <td><?php echo htmlspecialchars($user['user_name']) ?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>

    <a href="../Week_5/users_list.php"></a>
    <br>
    <h2>User search:</h2>
    <br>
    <h2>User details:</h2>
    <br>
    <h2>New user form:</h2>
    <br>





    <div class="container">
        <h2>Transactions List:</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Amount</th>
                    <th>Notes</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?php echo htmlspecialchars($transaction['user_id']) ?>
                    </td>
                    <td><?php echo htmlspecialchars($transaction['amount']) ?>
                    </td>
                    <td><?php echo htmlspecialchars($transaction['notes']) ?>
                    </td>
                    <td><?php echo htmlspecialchars($transaction['category']) ?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>

    <footer>
        <p style="text-align: center;">
            Copyright © 2020 emiDev Inc. All rights reserved.
        </p>
    </footer>
</body>

</html>