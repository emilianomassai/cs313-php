<?php
// start session
session_start();
require "../Project_Budget_your_life/connectAppDB.php";
$db = get_db();

$editTransaction = $_POST['edit'];

echo 'Edit transaction number: ' . $editTransaction;