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

foreach ($db->query('SELECT transaction_id, amount, user_id, notes, category, date FROM transaction') as $row) {
    $transactions_array[] = [
        'transaction_id' => $row['transaction_id'],
        'amount' => $row['amount'],
        'user_id' => $row['user_id'],
        'notes' => $row['notes'],
        'category' => $row['category'],
        'date' => $row['date'],
    ];
    $_SESSION['transactions'] = $transactions_array;

    if (($_POST["edit"] == $transactions_array[$transaction_count]['transaction_id'])) {?>
<tr>
    <td style="padding:10px"><?php echo $transactions_array[$transaction_count]['amount'] ?>

    </td>
    <td style="padding:10px"><?php echo $transactions_array[$transaction_count]['notes'] ?>
    </td>
    <td style="padding:10px"><?php echo $transactions_array[$transaction_count]['category'] ?>
    </td>
    < style="padding:10px"><?php echo $transactions_array[$transaction_count]['date'] ?>

        </td>
        <?php }?>

</tr>
<?php $transaction_count++;
}?>