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

echo 'Edit transaction number: ' . $editTransaction;

foreach ($db->query('SELECT transaction_id, amount, user_id, notes, category, date FROM transaction') as $row) {
    $transactions_array[] = [
        'transaction_id' => $row['transaction_id'],
        'amount' => $row['amount'],
        'user_id' => $row['user_id'],
        'notes' => $row['notes'],
        'category' => $row['category'],
        'date' => $row['date'],
    ];

    echo 'Transaction number: ' . $editTransaction;
    echo 'Amount: ' . $transactions_array[$transaction_count]['amount'];
    echo 'User ID: ' . $transactions_array[$transaction_count]['user_id'];
    echo 'Notes: ' . $transactions_array[$transaction_count]['notes'];
    echo 'Category: ' . $transactions_array[$transaction_count]['category'];
    echo 'Date: ' . $transactions_array[$transaction_count]['date'];

}