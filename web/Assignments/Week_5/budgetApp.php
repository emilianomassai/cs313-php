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
$count = 0;
foreach ($db->query('SELECT display_name, user_name, user_id, password FROM budgetUser') as $row) {

    $users_array[] = [
        'display_name' => $row['display_name'],
        'user_name' => $row['user_name'],
        'user_id' => $row['user_id'],
        'password' => $row['password'],
    ];
    $_SESSION['users'] = $users_array;
    echo 'USERS ARRAY: ' . $users_array[$count]['display_name'];
    $count++;
}

foreach ($db->query('SELECT amount, user_id, notes, category, date FROM transaction') as $row) {
    $transactions_array[] = [
        'amount' => $row['amount'],
        'user_id' => $row['user_id'],
        'notes' => $row['notes'],
        'category' => $row['category'],
    ];
    $_SESSION['transactions'] = $transactions_array;
}

?>

    <h1>Project Title: Budget App </h1>
    <br>
    <h2>List of all the users of the app:</h2>
    <div class="container">

        <!-- A list of all users in the system, each one is a link that leads to a user details page.  -->

        <h2>User List</h2>
        <table class="table table-bordered">

            <tbody>


                <tr>
                    <form action="users_list.php" method="post">
                        <select name="name_user">
                            <?php foreach ($users_array as $user): ?>
                            <?php $name = htmlspecialchars($user['display_name']);?>
                            <?php $user_id = htmlspecialchars($user['user_id']);?>

                            <option value="<?php $user_id?>"><?php echo 'USER ' . $name . ' ID ' . $user_id ?></option>
                            <?php endforeach;?>
                            <br>
                            <br>
                            <br>

                            <input type="submit" name="See user details" />

                    </form>

            </tbody>
        </table>
    </div>

    <br>


    <!-- A simple form that allows for a last name to be entered, then the user list will be shown for all users that match the last name.  -->
    <h2>User search:</h2>
    <form class="userSearch" name="userSearch" action="../Week_5/user_search.php" method="post">

        <h4>Please enter the name of the user you are looking for:</h4>
        <span class="required-field"></span>

        <input placeholder="e.g.: Emiliano Massai" type="text" name="user_name" id="userName">
        <br />
        <div class="bottomBar">
            <button type="submit" name="search" id="searchUser">Search</button>
        </div>
        </section>
    </form>
    <br>

    <!-- A view of a single user, showing all the  income, expenses, notes, category of the transaction, date of the transaction etc.  -->
    <h2>User details:</h2>
    <br>

    <!-- This will be submitted and handled in the next assignment, but for this week, checkboxes are dynamically created based upon what is in the database.  -->
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
                <?php foreach ($transactions_array as $transaction): ?>
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