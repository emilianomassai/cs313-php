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

<h1>BETA: Budget App</h1>

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

// echo "Host: " . $dbHost;
// echo "<br>";
// echo "Port: " . $dbPort;
// echo "<br>";
// echo "User: " . $dbUser;
// echo "<br>";
// echo "Password: " . $dbPassword;
// echo "<br>";
// echo "Database Name: " . $dbName;
// echo "<br>";
// echo "Database URL: " . $dbUrl;
// echo "<br>";

echo "<br>";
?>


    <?php

    foreach ($db->query('SELECT display_name, user_name, user_id, password FROM budgetUser') as $row) {

    $users[] = [
    'display_name' => $row['display_name'],
    'user_name' => $row['user_name'],
    'user_id' => $row['user_id'],
    'password' => $row['password'],
    ];



    // echo $row['display_name'];
    // echo '<br />';
    // foreach ($db->query('SELECT amount, notes, category, date FROM transaction') as $row) {
    // echo $row['amount'];
    // echo '<br />';
    // echo $row['notes'];
    // echo '<br />';
    // echo $row['category'];
    // echo '<br />';
    // echo $row['date'];
    // echo '<br />';
    // }

    echo '<br />';

    ?>

    <?php
foreach ($db->query('SELECT amount, user_id, notes, category, date FROM transaction') as $row) {
    $transactions[] = [
        'amount' => $row['amount'],
        'trans_user_id' => $row['user_id'],
        'notes' => $row['notes'],
        'category' => $row['category'],
    ];

}
?>

    <div class="container">
        <h2>User List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['display_name']) ?>
                    </td>
                    <td><?php echo htmlspecialchars($user['user_name']) ?>
                    </td>
                    <td><?php echo htmlspecialchars($user['password']) ?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>

    <div class="container">
        <h2>Transactions List:</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User_Id</th>
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

</body>

</html>