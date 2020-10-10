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

echo "Host: " . $dbHost;
echo "<br>";
echo "Port: " . $dbPort;
echo "<br>";
echo "User: " . $dbUser;
echo "<br>";
echo "Password: " . $dbPassword;
echo "<br>";
echo "Database Name: " . $dbName;
echo "<br>";
echo "Database URL: " . $dbUrl;
echo "<br>";

echo "<br>";
echo "<br>";

echo "The following is  the list of all the users:";
echo "<br>";

foreach ($db->query('SELECT display_name FROM budgetUser') as $row) {
    $budget_USER = $db->query('SELECT user_id FROM budgetUser');
    $transaction_USER = $db->query('SELECT user_id FROM transaction');
    echo $row['display_name'];
    echo '<br/>';
    echo $budget_USER;
    echo '<br/>';
    echo $transaction_USER;
    echo '<br/>';
    foreach ($db->query('SELECT amount, notes, category, date FROM transaction') as $row) {
        if ($budget_USER == $transaction_USER) {
            echo $row['amount'];
            echo '<br/>';
            echo $row['notes'];
            echo '<br/>';
            echo $row['category'];
            echo '<br/>';
            echo $row['date'];
            echo '<br/>';
        }
    }
}
echo '<br/>';

?>

</body>

</html>