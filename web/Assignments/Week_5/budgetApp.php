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
    <link rel="icon" type="image/ico" href="./BudgetAppImages/budgetAppIcon.png">

    <script src="../Week_5/javaScript.js"></script>

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
    <div>
        <img src="../Home_Page/images/me.jpg" alt="budget App Picture" id="budgetAppPicture " />
    </div>
    <p>Welcome to this budget app! In this page you can see different ways to retrieve information from our database
        about our users. Please choose one option and read the description for more details:</p>
    <div class="container">

        <!-- A list of all users in the system, each one is a link that leads to a user details page.  -->

        <h2>User List</h2>
        <h4>Choose one user from the database and click the submit button to see more details about him or her.</h4>
        <table class="table table-bordered">

            <tbody>


                <tr>
                    <form action="users_list.php" method="post">
                        <select name="userID">
                            <?php foreach ($users_array as $user): ?>
                            <?php $name = htmlspecialchars($user['display_name']);?>
                            <?php $user_id = htmlspecialchars($user['user_id']);?>

                            <option value="<?php echo $user_id ?>"><?php echo $name ?>
                            </option>
                            <?php endforeach;?>
                            <br>
                            <br>
                            <br>

                            <input type="submit" name="Submit" />

                    </form>

            </tbody>
        </table>
    </div>

    <br>
    <hr>


    <!-- A simple form that allows for a last name to be entered, then the user list will be shown for all users that match the last name.  -->
    <h2>User search:</h2>
    <form class="userSearch" name="userSearch" action="../Week_5/user_search.php" method="post" \
        onsubmit="return validateForm()">

        <h4>Please enter the name of the user you are looking for:</h4>

        <input placeholder="e.g.: Emiliano Massai" type="text" name="name_user" id="nameUser">
        <br />
        <div class="bottomBar">
            <button type="submit" name="search" id="searchUser">Search</button>
        </div>
        </section>
    </form>
    <br>
    <hr>

    <!-- A view of a single user, showing all the  income, expenses, notes, category of the transaction, date of the transaction etc.  -->
    <h2>User transactions:</h2>
    <h4>Choose one user from the database and click the submit button to see all the recorded transactions of the user.
    </h4>
    <table class="table table-bordered">

        <tbody>


            <tr>
                <form action="user_transactions.php" method="post">
                    <select name="user_transaction">
                        <?php foreach ($users_array as $user): ?>
                        <?php $name = htmlspecialchars($user['display_name']);?>
                        <?php $user_id = htmlspecialchars($user['user_id']);?>

                        <option value="<?php echo $user_id ?>"><?php echo $name ?>
                        </option>
                        <?php endforeach;?>
                        <br>
                        <br>
                        <br>

                        <input type="submit" name="Submit" />

                </form>
                <br>
                <br>
                <hr>


                <!-- This will be submitted and handled in the next assignment, but for this week, checkboxes are dynamically created based upon what is in the database.  -->


                <h2>New user form:</h2>

                <form class="userForm" name="userForm" action="#" method="post">

                    <h4>Enter all the data for the new user:</h4>
                    <?php

// here I mixed php scripts into HTML to get dynamic names for the input fields. The names are created based upon what is the name of each column in my database.

$select = $db->query('SELECT * FROM budgetUser');
$total_column = $select->columnCount();
for ($counter = 0; $counter < $total_column; $counter++) {
    $meta = $select->getColumnMeta($counter);
    $column[] = $meta['name'];?>
                    <h4><label for="<?php echo $column[$counter] ?>"> <?php echo $column[$counter] ?></label> </h4>

                    <input type="text" id="<?php echo $column[$counter] ?>" name="<?php echo $column[$counter] ?>">
                    <?php }?>

                    <br>
                    <br>

                    <div class="bottomBar">
                        <button type="submit" name="search" id="searchUser">Add User</button>
                    </div>
                </form>


                <br>
                <br>
                <br>
                <hr>

                <div>
                    <a href="../Home_Page/assignments.php" id="CS313_assignments_btn_id">
                        Go to the CS313 Assignment's page
                    </a>
                </div>

                <footer>
                    <p style="text-align: center;">
                        Copyright © 2020 emiDev Inc. All rights reserved.
                    </p>
                </footer>
</body>

</html>