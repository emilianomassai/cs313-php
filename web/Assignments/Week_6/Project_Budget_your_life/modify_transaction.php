<?php
/**********************************************************
 * File: modify_transaction.php
 * Author: Emiliano Massai
 *
 * Description: This file use the transaction ID to retrieve
 * all the information of a given transaction. The user can
 * then modify or delete the transaction.
 ***********************************************************/
// start session
session_start();
require "../Project_Budget_your_life/connectAppDB.php";
$db = get_db();

$editTransaction = $_POST['edit'];
$_SESSION['transactions'] = $sessionTransactions;

echo 'Edit transaction number: ' . $editTransaction;

$transaction_count = 0;
foreach ($db->query("SELECT transaction_id, amount, user_id, notes, category, date FROM transaction WHERE transaction_id='$editTransaction'") as $row) {

    echo 'Transaction number: ' . $editTransaction;
    echo 'Amount: ' . $sessionTransactions[$transaction_count]['amount'];
    echo 'User ID: ' . $sessionTransactions[$transaction_count]['user_id'];
    echo 'Notes: ' . $sessionTransactions[$transaction_count]['notes'];
    echo 'Category: ' . $sessionTransactions[$transaction_count]['category'];
    echo 'Date: ' . $sessionTransactions[$transaction_count]['date'];
    $transaction_count++;

}