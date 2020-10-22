<?php
/**********************************************************
 * File: add_user.php
 * Author: Emiliano Massai
 *
 * Description: Takes input posted from budgetApp.php
 *   This file enters a new user into the database
 *   along with its associated full name, username and password.
 *
 *   This file does NOT do any rendering at all.
 ***********************************************************/

// get data from the POST of budgetApp.php new user form
$display_name = $_POST['display_name'];
$user_name = $_POST['user_name'];
$password = $_POST['password'];
?>


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

    <h1>Welcome, <?php echo $display_name ?>!</h1>
    <p>Please select an option to create your budget:</p>

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
require "../Project_Budget_your_life/connectAppDB.php";
$db = get_db();
try
{
    // Add the user

    // We do this by preparing the query with placeholder values
    $query = 'INSERT INTO public.budgetUser(display_name, user_name, password) VALUES(:display_name, :user_name, :password)';
    $statement = $db->prepare($query);

    // Now we bind the values to the placeholders. This does some nice things
    // including sanitizing the input with regard to sql commands.
    $statement->bindValue(':display_name', $display_name);
    $statement->bindValue(':user_name', $user_name);
    $statement->bindValue(':password', $password);

    $statement->execute();

    // // get the new id
    // $scriptureId = $db->lastInsertId("public.budgetUser_user_id_seq");

    // // Now go through each topic id in the list from the user's checkboxes
    // foreach ($topicIds as $topicId) {
    //     echo "ScriptureId: $scriptureId, topicId: $topicId";

    //     // Again, first prepare the statement
    //     $statement = $db->prepare('INSERT INTO scripture_topic(scriptureId, topicId) VALUES(:scriptureId, :topicId)');

    //     // Then, bind the values
    //     $statement->bindValue(':scriptureId', $scriptureId);
    //     $statement->bindValue(':topicId', $topicId);

    //     $statement->execute();
    // }
} catch (Exception $ex) {
    // Please be aware that you don't want to output the Exception message in
    // a production environment
    echo "Error with DB. Details: $ex";
    die();
}

// finally, redirect them to a new page to actually show the topics
// header("Location: showTopics.php");

die(); // we always include a die after redirects. In this case, there would be no
// harm if the user got the rest of the page, because there is nothing else
// but in general, there could be things after here that we don't want them
// to see.

?>