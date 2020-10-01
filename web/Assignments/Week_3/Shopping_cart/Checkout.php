<?php
// start session
session_start();
$_SESSION["list_items"] = $_POST["list_items"];
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

<body onload="resetAllMessages();">
    <!-- TOP BAR OF THE PAGE  -->

    <div class="topBar">
        <a href="../Shopping_cart/Browse_Items.php" style="margin-top: -4px"><img src="../Shopping_cart/images/logo.png"
                alt="logo" style="margin-top: 17px; margin-left: 45px; float: left; width: 165px" />
        </a>

        <!-- TOP MENU -->

        <div class="navbar">
            <a href="../Shopping_cart/Browse_Items.php">Return to browse items page</a>
            <p></p>
            <a href="../Shopping_cart/View_Cart.php">Return to the cart
                <img src="../Shopping_cart/images/cart.png" alt="cart" />
            </a>
        </div>
    </div>

    <form class="userInfo" name="userInfo" action="#" onreset="resetAllMessages();
          document.getElementById('firstName').focus();" onsubmit="return checkForm();">
        <p id="msg"></p>
        <section id="userInfoForm">
            <h2>To finish your purchases, please enter your information:</h2>
            <br />

            <!-- FIRST NAME FORM FIELD -->

            <h4>First Name:</h4>
            <span class="required-field"></span>

            <input placeholder="e.g.: Michael" type="text" name="first_name" id="firstName"
                onchange="firstNameValidating();" />
            <br />
            <span id="firstNameError"></span>

            <!-- LAST NAME FORM FIELD -->

            <h4>Last Name:</h4>
            <span class="required-field"></span>

            <input placeholder="e.g.: White" type="text" name="last_name" id="lastName"
                onchange="lastNameValidating();" />
            <br />
            <span id="lastNameError"></span>

            <!-- ADDRESS FORM FIELD -->

            <h4>Address:</h4>
            <span class="required-field"></span>

            <textarea placeholder="street address, city, state, and zip" name="address" id="address" cols="50" rows="5"
                onchange="addressValidating();"></textarea>
            <br />

            <span id="addressError"></span>

            <!-- PHONE FORM FIELD -->

            <h4>Phone:</h4>
            <span class="required-field"></span>

            <input type="text" maxlength="12" placeholder="e.g.: 208-497-3657" name="phone" id="phone"
                onchange="phoneValidating();" />
            <br />

            <span id="phoneError"></span>

            <!-- CREDIT CARD RADIO BUTTON GROUP -->

            <div class="creditCard">
                <h4>Credit Card Type:</h4>
                <span class="required-field"></span>

                <input id="visa" type="radio" name="card" value="visa" onclick="creditCardTypeValidating();" />
                <img src="../Shopping_cart/images/Visa_icon.png" alt="" />
                <input id="mastercard" type="radio" name="card" value="mastercard"
                    onclick="creditCardTypeValidating();" />
                <img src="../Shopping_cart/images/Master_Card_icon.png" alt="" />
                <input id="americanExpress" type="radio" name="card" value="american express"
                    onclick="creditCardTypeValidating();" />
                <img src="../Shopping_cart/images/American_icon.png" alt="" />
                <br />
                <span id="creditCardTypeError"></span>
            </div>

            <br />

            <!-- CREDIT CARD NUMBER FORM FIELD -->

            <div class="creditCardNumber">
                <h4>Card Card Number:</h4>
                <span class="required-field"></span>

                <input placeholder="e.g.: 3526789674321567" type="text" name="credit_card" id="creditCard"
                    maxlength="16" onchange="creditCardNumberValidating();" />
                <br />
                <span id="creditCardNumberError"></span>
            </div>

            <!-- CREDIT CARD EXPIRATION DATE FIELD -->

            <div class="creditCardExpiration">
                <h4>Credit Card Expiration Date:</h4>
                <span class="required-field"></span>

                <input placeholder="e.g.: 3/2020" type="text" name="exp_date" id="expDate" maxlength="7"
                    onchange="expirationDateValidating();" />
                <br />
                <span id="expirationDateError"></span>
            </div>

            <!-- TOTAL FIELD -->
            <h2>Total:</h2>

            <?php

if (!empty($_SESSION["list_items"])) {
    // Loop to store and display values of individual checked checkbox.
    foreach ($_SESSION["list_items"] as $selected => $element) {

        // if the checked value is the last, add a period instead of a comma.

    }

    if ($selected === array_key_last($_SESSION["list_items"])) {
        echo '<li>' . $element . '.';
    } else {
        echo '<li>' . $element . ';';
        echo "<br>";
        echo "<br>";

    }
}
?>


            <input value="$0.00" readonly="readonly" type="text" id="total" name="total" />
            <br />
            <br />
            <!-- RESET AND SUBMIT AREA -->

            <div class="bottomBar">
                <button type="reset" name="reset" id="clear">Clear</button>
                <button type="submit" name="validate" id="calculate">Buy now</button>
            </div>
        </section>
    </form>

    <footer>
        <p style="text-align: center; color: white">
            Copyright © 2020 emiDev Inc. All rights reserved.
        </p>
    </footer>
</body>

</html>