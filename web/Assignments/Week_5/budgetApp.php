<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
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
echo "<br>";

echo "The following is  the list of all the users:";
echo "<br>";

foreach ($db->query('SELECT display_name FROM budgetUser') as $row) {

    $users[] = [
        'display_name' => $row['display_name'],
    ];

    // echo $row['display_name'];
    // echo '<br/>';
    // foreach ($db->query('SELECT amount, notes, category, date FROM transaction') as $row) {
    //     echo $row['amount'];
    //     echo '<br/>';
    //     echo $row['notes'];
    //     echo '<br/>';
    //     echo $row['category'];
    //     echo '<br/>';
    //     echo $row['date'];
    //     echo '<br/>';
    // }
}
echo '<br/>';

foreach ($db->query('SELECT amount, notes, category, date FROM transaction') as $row) {

    $transaction[] = [
        'amount' => $row['amount'],
        'notes' => $row['notes'],
        'category' => $row['category'],
        'date' => $row['date'],
    ];

    // echo $row['display_name'];
    // echo '<br/>';
    // foreach ($db->query('SELECT amount, notes, category, date FROM transaction') as $row) {
    //     echo $row['amount'];
    //     echo '<br/>';
    //     echo $row['notes'];
    //     echo '<br/>';
    //     echo $row['category'];
    //     echo '<br/>';
    //     echo $row['date'];
    //     echo '<br/>';
    // }
}
echo '<br/>';

?>
    ?>



    <div class="container">
        <h1>User List</h1>
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
                    <td><?php echo htmlspecialchars($user['display_name']) ?></td>


                    <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?php echo htmlspecialchars($transaction['amount']) ?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>

</html>