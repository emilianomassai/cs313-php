<?php
// start session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <script src="../Shopping_cart/formValidatorLogic.js"></script>
    <link rel="stylesheet" href="style.css" />

    <title>
        Amazon.com: Online Shopping for Electronics, Apparel, Computers, Books,
        DVDs & more
    </title>
    <meta name="description" content="Online shopping from the earth's
            biggest selection of books, magazines, music, DVDs, videos,
            electronics, computers, software, apparel & accessories, shoes,
            jewelry, tools & hardware, housewares, furniture, sporting goods,
            beauty & personal care, broadband & dsl, gourmet food & just about
            anything else." />

    <link rel="icon" type="image/ico" href="../Shopping_cart/images/favicon_amazon.png" />
</head>

<body>

    <!-- TOP BAR OF THE PAGE  -->

    <div class="topBar">
        <img src="../Shopping_cart/images/logo.png" alt="logo"
            style="margin-top: 17px; margin-left: 45px; float: left; width: 165px" />


        <!-- TOP MENU -->

        <div class="navbar">
            <a href="../../../Assignments/Home_Page/assignments.php">Return to CS 313 Assignments</a>

            </a>
        </div>
    </div>

    <p id="msg"></p>
    <section id="userInfoForm">
        <h1>Thank you for your purchase!</h1>
        <br />
        <h4>The following is the list of the items you purchased:</h4>

        <?php

$array_items = $_SESSION['cart'];

$address = $_POST['address'];

if (!empty($array_items)) {

    $sum = 0;

// Loop to store and display values of individual checked checkbox.
    foreach ($array_items as $selected => $element) {
        // if the checked value is the last, add a period instead of a comma.

        switch ($element) {
            case "139.99":
                $sum += $element;
                $element = "Christmas tree with lights - $" . $element;
                break;
            case "14.88":
                $sum += $element;
                $element = "Harry Potter Quidditch Ornament - $" . $element;
                break;
            case "199.00":
                $sum += $element;
                $element = "Bose Home Speaker - $" . $element;
                break;
            case "31.99":
                $sum += $element;
                $element = "Christmas Stockings, 4 Pcs - $" . $element;
                break;
            case "1495.00":
                $sum += $element;
                $element = "Apple iPhone 11 Pro Max, 256GB - $" . $element;
                break;
            case "16.99":
                $sum += $element;
                $element = "Decorative Square Throw Pillow, Pack of 2 - $" . $element;
                break;

        }

        if ($selected === array_key_last($array_items)) {
            echo '<li>' . $element . '.';
        } else {

            unset($array_items[0]);
            echo '<li>' . $element . ';';
            echo "<br>";
            echo "<br>";

        }

    }
    echo "<h4></h4>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo 'You spent $' . $sum . ' for this purchase. ';
    echo "<br>";
    echo "<br>";

    echo 'The address to which the items will be shipped is: ';
    echo $address;
    echo "<br>";
    echo "<br>";

}

?>
        </h2>
    </section>

    <br>


    <footer>
        <p style="text-align: center; color: white">
            Copyright © 2020 emiDev Inc. All rights reserved.
        </p>
    </footer>
</body>

</html>

<?php
session_destroy();
?>