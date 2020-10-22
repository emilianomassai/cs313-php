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

// For debugging purposes, you might include some echo statements like this
// and then not automatically redirect until you have everything working.

echo "display_name=$display_name\n";
echo "user_name=$user_name\n";
echo "password=$password\n";