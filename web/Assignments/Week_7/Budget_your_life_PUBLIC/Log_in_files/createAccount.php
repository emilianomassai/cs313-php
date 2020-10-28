<?php
/**********************************************************
 * File: createAccount.php
 * Author: Br. Burton
 *
 * Description: Accepts a new user_name and password on the
 *    POST variable, and creates it in the DB.
 *
 * The user is then redirected to the signIn.php page.
 *
 ***********************************************************/

// If you have an earlier version of PHP (earlier than 5.5)
// You need to download and include password.php.
//require("password.php");

// get the data from the POST
$display_name = $_POST['display_name'];
$user_name = $_POST['txtUser'];
$password = $_POST['txtPassword'];

if (!isset($display_name) || $display_name == ""
    || !isset($user_name) || $user_name == ""
    || !isset($password) || $password == "") {
    header("Location: signUp.php");
    die(); // we always include a die after redirects.
}

// Let's not allow HTML in our user_names. It would be best to also detect this before submitting the form and prevent the submission.
$display_name = htmlspecialchars($display_name);

$user_name = htmlspecialchars($user_name);

// Get the hashed password.
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Connect to the database
require "connectAppDB.php";
$db = get_db();

$query = 'INSERT INTO public.budgetUser (user_name, password, display_name) VALUES(:user_name, :password, :display_name)';
$statement = $db->prepare($query);
$statement->bindValue(':user_name', $user_name);
$statement->bindValue(':display_name', $display_name);

// **********************************************
// NOTICE: We are submitting the hashed password!
// **********************************************
$statement->bindValue(':password', $hashedPassword);

$statement->execute();

// finally, redirect them to the sign in page
header("Location: signIn.php");
die(); // we always include a die after redirects. In this case, there would be no
// harm if the user got the rest of the page, because there is nothing else
// but in general, there could be things after here that we don't want them
// to see.