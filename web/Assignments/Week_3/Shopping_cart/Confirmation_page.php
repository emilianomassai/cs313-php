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

    <p id="msg"></p>
    <section id="userInfoForm">
        <h2>Thanks for your purchase! The following is the list of the items you have bought:</h2>
        <br />

        <?php
$array_items = $_POST['list_items'];

if (!empty($array_items)) {

    $sum = 0;

    $cartArray = array("");
// Loop to store and display values of individual checked checkbox.
    foreach ($array_items as $selected => $element) {
        // if the checked value is the last, add a period instead of a comma.
        array_push($cartArray, $element);

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
            echo '<li>' . $element . ';';
            echo "<br>";
            echo "<br>";

        }

        // // //store the total of the items in a variable
        // // //Make sure that the session variable actually exists!
        // // $sum = 0;

        // //Loop through it like any other array.
        // foreach ($_SESSION['cart'] as $productPrice) {
        //     //sum up the total of all the items in the cart
        //     $sum += $productPrice;
        // }

    }
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo 'For a total of $' . $sum . '. ';
    echo "<br>";
    echo "<br>";
    echo "<br>";

    $_SESSION['cart'] = $cartArray;
}

if (empty($array_items)) {
    echo 'No item in the cart yet!';
    echo "<br>";
    echo "<br>";

}

?>

        <footer>
            <p style="text-align: center; color: white">
                Copyright © 2020 emiDev Inc. All rights reserved.
            </p>
        </footer>
</body>

</html>