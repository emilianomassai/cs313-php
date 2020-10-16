<?php
// start session
session_start();
// $address = $_POST['address'];
// $first_name = $_POST['first_name'];
// $last_name = $_POST['last_name'];
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />

    <!--Title in the browser title bar.-->
    <title>CS:313 - Week 5</title>
    <!-- heading of the web page -->
</head>

<body>

    <div class="container">

        <h2>List of users:</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['users_array'] as $user): ?>
                <?php $name = htmlspecialchars($user['display_name']);?>

                <tr>
                    <td><?php echo htmlspecialchars($user['user_id']) ?>
                    </td>
                    <td><?php echo "<a href='../Week_5/users_list.php'> $name </a>" ?>
                    </td>
                    <td><?php echo htmlspecialchars($user['user_name']) ?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>

    <br>

    <div class="container">

        <h2>List of transactions:</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Amount</th>
                    <th>Notes</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['transactions_array'] as $transaction): ?>
                <tr>
                    <td><?php echo htmlspecialchars($transaction['user_id']) ?>
                    </td>
                    <td><?php echo htmlspecialchars($transaction['amount']) ?>
                    </td>
                    <td><?php echo htmlspecialchars($transaction['notes']) ?>
                    </td>
                    <td><?php echo htmlspecialchars($transaction['category']) ?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>

    <footer>
        <p style="text-align: center;">
            Copyright © 2020 emiDev Inc. All rights reserved.
        </p>
    </footer>
</body>

</html>