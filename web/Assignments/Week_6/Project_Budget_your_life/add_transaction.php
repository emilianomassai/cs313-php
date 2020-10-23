<?php

// start session
session_start();
require "../Project_Budget_your_life/connectAppDB.php";
$db = get_db();
//Here I should have the user ID, transaction information passed with session

$actualUserId = $_POST["input_user_id"];
$category = $_POST['category'];
$amount = $_POST['input_amount'];
$notes = $_POST['input_notes'];
$date = $_POST['input_date'];

?>

<h3>Thank you, your transaction will be recorded.</h3>


<?php
echo 'User ID: ' . $actualUserId . ';';
echo 'category: ' . $category . ';';
echo 'amount: ' . $amount . ';';
echo 'notes: ' . $notes . ';';
echo 'date: ' . $date . ';';

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