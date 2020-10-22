<?php
/**********************************************************
 * File: add_transaction.php
 * Author: Emiliano Massai
 *
 * Description: Takes input of a transaction and add it to an user.
 *   This file enters a new transaction into the database
 *   along with its associated date, amount, user_id, notes and category.
 *
 ***********************************************************/
?>

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

    // Here I should have a form with all the transaction information such as:

// user_id
    // amount
    // notes
    // category
    // date (try to add dynamic date with PHP)

    if ($_POST["userID"] == $users_array[$count]['user_id']) {?>

    <h1>Ready to add a transaction, <?php echo $users_array[$count]['display_name'] ?>?</h1>
    <p>Please add all the following details:</p>

    <!-- use POST to link the current user to the new transaction and add it to the database -->

    <h3>Hello <?php echo $users_array[$count]['display_name'] ?>, your id is
        <?php echo $users_array[$count]['user_id'] ?></h3>

    <?php
$actualUserId = $users_array[$count]['user_id'];

// echo 'Name: ' . $users_array[$count]['display_name'] . ';';
        // echo '<br>';
        // echo 'User ID: ' . $users_array[$count]['user_id'] . ';';
        // echo '<br>';
        // echo 'Username: ' . $users_array[$count]['user_name'] . ';';
        // echo '<br>';
        // echo 'Password: ' . $users_array[$count]['password'] . '.';
        // echo '<br>';
        $query = 'INSERT INTO public.transaction(user_id, amount, notes, category, date) VALUES(:user_id, :amount, :notes, :category, :date)';
        $statement = $db->prepare($query);

// Now we bind the values to the placeholders. This does some nice things
        // including sanitizing the input with regard to sql commands.
        $statement->bindValue(':user_id', $actualUserId);
        $statement->bindValue(':amount', $amount);
        $statement->bindValue(':notes', $notes);
        $statement->bindValue(':category', $category);
        $statement->bindValue(':date', $date);

        $statement->execute();

    }
    $count++;
}
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


<?php
// require "../Project_Budget_your_life/connectAppDB.php";
// $db = get_db();
// try
// {
//     // Add the user

//     // We do this by preparing the query with placeholder values
//     $query = 'INSERT INTO public.budgetUser(display_name, user_name, password) VALUES(:display_name, :user_name, :password)';
//     $statement = $db->prepare($query);

//     // Now we bind the values to the placeholders. This does some nice things
//     // including sanitizing the input with regard to sql commands.
//     $statement->bindValue(':display_name', $display_name);
//     $statement->bindValue(':user_name', $user_name);
//     $statement->bindValue(':password', $password);

//     $statement->execute();

//     // // get the new id
//     // $scriptureId = $db->lastInsertId("public.budgetUser_user_id_seq");

//     // // Now go through each topic id in the list from the user's checkboxes
//     // foreach ($topicIds as $topicId) {
//     //     echo "ScriptureId: $scriptureId, topicId: $topicId";

//     //     // Again, first prepare the statement
//     //     $statement = $db->prepare('INSERT INTO scripture_topic(scriptureId, topicId) VALUES(:scriptureId, :topicId)');

//     //     // Then, bind the values
//     //     $statement->bindValue(':scriptureId', $scriptureId);
//     //     $statement->bindValue(':topicId', $topicId);

//     //     $statement->execute();
//     // }
// } catch (Exception $ex) {
//     // Please be aware that you don't want to output the Exception message in
//     // a production environment
//     echo "Error with DB. Details: $ex";
//     die();
// }

// // finally, redirect them to a new page to actually show the topics
// // header("Location: showTopics.php");

// die(); // we always include a die after redirects. In this case, there would be no
// // harm if the user got the rest of the page, because there is nothing else
// // but in general, there could be things after here that we don't want them
// // to see.

?>