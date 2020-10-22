<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/ico" href="../Project_Budget_your_life/BudgetAppImages/budgetAppIcon.png">

    <script src="../Project_Budget_your_life/javaScript.js"></script>

    <!--Title in the browser title bar.-->
    <title>Budget Your Life</title>
    <!-- heading of the web page -->
</head>

<body>


    <?php

// start session
session_start();
require "../Project_Budget_your_life/connectAppDB.php";
$actual_user_id_value = $_SESSION['actual_user_id_name'];

$db = get_db();

$count = 0;
foreach ($db->query('SELECT display_name, user_name, user_id, password FROM budgetUser') as $row) {

    $users_array[] = [
        // used to display a customized message
        'display_name' => $row['display_name'],
        'user_name' => $row['user_name'],
        // used to link the transaction to the correct user

        'user_id' => $row['user_id'],
        // STRETCH CHALLENGE - used to add the transaction only if the user enter a correct password

        'password' => $row['password'],
    ];
    $_SESSION['users'] = $users_array;

    ?>

    <h3>Thank you <?php echo $users_array[$count]['display_name'] ?>, your transaction will be recorded.</h3>

    <?php

    $category = $_POST['category'];
    $amount = $_POST['input_amount'];
    $notes = $_POST['input_notes'];
    $date = $_POST['input_date'];

    echo 'User ID: ' . $actual_user_id_value . ';';
    echo 'category: ' . $category . ';';
    echo 'amount: ' . $amount . ';';
    echo 'notes: ' . $notes . ';';
    echo 'date: ' . $date . ';';

    // echo 'Name: ' . $users_array[$count]['display_name'] . ';';
    // echo '<br>';
    // echo 'User ID: ' . $users_array[$count]['user_id'] . ';';
    // echo '<br>';
    // echo 'Username: ' . $users_array[$count]['user_name'] . ';';
    // echo '<br>';
    // echo 'Password: ' . $users_array[$count]['password'] . '.';
    // echo '<br>';
    $query = 'INSERT INTO public.transaction(user_id, amount, notes, category, date) VALUES(:user_id, :amount, :notes,
    :category, :date)';
    $statement = $db->prepare($query);

    // Now we bind the values to the placeholders. This does some nice things
    // including sanitizing the input with regard to sql commands.
    $statement->bindValue(':user_id', $actual_user_id_value);
    $statement->bindValue(':amount', $amount);
    $statement->bindValue(':notes', $notes);
    $statement->bindValue(':category', $category);
    $statement->bindValue(':date', $date);

    $statement->execute();

}
$count++;

?>


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