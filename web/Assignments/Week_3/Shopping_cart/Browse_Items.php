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
            <a href="../../Home_Page/assignments.php">CS 313 Assignments</a>
            <p></p>
            <a href="#products">See All Products</a>

            </a>
        </div>

        <div id="welcome">
            <!-- BEST PRODUCTS BOXES -->

            <div class="bestProductsBox">
                <h2>Today’s Deals:</h2>
                <a href="#nameProduct_0"><img id="deal_1" src="../Shopping_cart/images/tree.jpg"
                        alt="Christmas tree" /></a>
                <a href="#nameProduct_1"><img id="deal_2" src="../Shopping_cart/images/Harry_Potter.png"
                        alt="Harry_Potter_decoration" /></a>
                <a href="#nameProduct_2"><img id="deal_3" src="../Shopping_cart/images/Bose_speaker.png"
                        alt="Bose_speaker" /></a>
            </div>

            <div id="initialMessage">
                <img src="../Shopping_cart/images/Holiday.jpg" alt="Happy Holiday Deals" />
            </div>
        </div>
    </div>

    <!-- FORM INCLUDING PRODUCTS TABLE-->

    <form action="View_Cart.php" method="post" class="userInfo" name="userInfo">


        <?php

foreach ($_SESSION['cart'] as $key => $value) {

    $item_0_selected = "unchecked";
    $item_1_selected = "unchecked";
    $item_2_selected = "unchecked";
    $item_3_selected = "unchecked";
    $item_4_selected = "unchecked";
    $item_5_selected = "unchecked";

    echo $value;
    echo '<br>';

    switch ($value) {
        case "139.99":
            $item_0_selected = 'checked';
            break;
        case "14.88":
            $item_1_selected = 'checked';
            break;
        case "199.00":
            $item_2_selected = 'checked';
            break;
        case "31.99":
            $item_3_selected = 'checked';
            break;
        case "1495.00":
            $item_4_selected = 'checked';
            break;
        case "16.99":
            $item_5_selected = 'checked';
            break;
    }
}
?>

        <!-- TABLE WITH PRODUCT CHECKBOXES -->

        <table id="products">
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Category</th>
                <th>Price</th>
                <th>Buy</th>
            </tr>

            <!-- FIRST PRODUCT -->
            <tr>
                <td>
                    <img class="productImage" src="../Shopping_cart/images/tree.jpg" alt="Christmas tree" />
                </td>
                <td id="nameProduct_0">
                    <h3>Christmas tree with lights:</h3>
                    <p>
                        PRE-LIT TO SAVE TIME: Keep your holidays hassle-free with this
                        pre-strung Henry fir tree, which saves you both the time and
                        effort of untangling, putting up, and taking down your Christmas
                        tree lights every year. <br />
                        THREE COLOR MODES: Includes a remote control to easily set your
                        preferred color as well as turn the lights on and off. The 3 color
                        modes are: warm white, multicolor, and alternating warm white and
                        multicolor.
                    </p>
                </td>
                <td class="category">Seasonal Décor</td>
                <td>$139.99</td>
                <td>
                    <input class="productPrice" type="checkbox" name="list_items[]" value="139.99"
                        checked="<?php echo $item_0_selected ?>" />
                </td>
            </tr>

            <!-- SECOND PRODUCT -->

            <tr>
                <td>
                    <img class="productImage" src="../Shopping_cart/images/Harry_Potter.png" alt="Sherlock_DVD" />
                </td>
                <td id="nameProduct_1">
                    <h3>Harry Potter Quidditch Ornament:</h3>
                    <p>
                        Summon seasonal fun with this stylized Christmas ornament of Harry
                        Potter wearing his Quidditch robe as he rides his Nimbus 2000
                        broomstick. <br />
                        Made of resin, this Hallmark Ornament measures 3 x 3 x 1. 625
                        inches. The ornament is ready to hang on your Christmas tree with
                        a hanger attachment.
                        <br />
                        Great gift for fans of the Harry Potter books and movies, Hogwarts
                        School of Witchcraft and Wizardry, and House Gryffindor.
                    </p>
                </td>
                <td class="category">Seasonal Décor</td>
                <td>$14.88</td>
                <td>
                    <input class="productPrice" type="checkbox" name="list_items[]" value="14.88" />
                </td>
            </tr>

            <!-- THIRD PRODUCT -->

            <tr>
                <td>
                    <img class="productImage" src="../Shopping_cart/images/Bose_speaker.png" alt="Bose Speaker" />
                </td>
                <td id="nameProduct_2">
                    <h3>Bose Home Speaker:</h3>
                    <p>
                        Room-rocking bass and 360-degree, lifelike sound in a compact
                        size. <br />
                        Built-in voice assistants, like Alexa and the Google Assistant,
                        with superior voice pickup from a noise-rejecting six-microphone
                        Array. <br />
                        With Wi-Fi, Bluetooth, and Apple airplay 2 compatibility, play
                        your favorite music services or anything from your phone or
                        tablet. <br />
                        Alexa speaks English and Spanish.
                    </p>
                </td>
                <td class="category">Technology</td>
                <td>$199.00</td>
                <td>
                    <input class="productPrice" type="checkbox" name="list_items[]" value="199.00" />
                </td>
            </tr>

            <!-- FOURTH PRODUCT -->

            <tr>
                <td>
                    <img class="productImage" src="../Shopping_cart/images/Christmas_stockings.png"
                        alt="Christmas Stockings" />
                </td>
                <td>
                    <h3>Christmas Stockings, 4 Pcs:</h3>
                    <p>
                        ORIGINAL DESIGN. Large burlap snowflake decor. Better to match
                        with Ivenf Burlap Plaid Snowflake Christmas Tree Skirt. <br />
                        RUSTIC FEEL. 100% quality jute snowflake, classic plaid & plush
                        faux fur. Add a warm & luxury touch to your holiday decor. <br />
                        4 PACK BULK. Ready to be stuffed with goodies gifts for whole
                        family. Unique family stockings for christmas. <br />
                        STRONG & DURABLE. Triple layers design with pp cotton inside.
                        Super thick & sturdy. Last for years to come.
                    </p>
                </td>
                <td class="category">Seasonal Décor</td>
                <td>$31.99</td>
                <td>
                    <input class="productPrice" type="checkbox" name="list_items[]" value="31.99" />
                </td>
            </tr>

            <!-- FIFTH PRODUCT -->

            <tr>
                <td>
                    <img class="productImage" src="../Shopping_cart/images/Iphone_11.png" alt="Iphone 11" />
                </td>
                <td>
                    <h3>Apple iPhone 11 Pro Max, 256GB:</h3>
                    <p>
                        Renewed products work and look like new. These pre-owned products
                        are not Apple certified but have been inspected and tested by
                        Amazon-qualified suppliers. Box and accessories (no headphones
                        included) may be generic. Wireless devices come with the 90-day
                        Amazon Renewed Guarantee. <br />
                        <br />
                        6.5-inch Super Retina XDR OLED display <br />
                        Water and dust resistant (4 meters for up to 30 minutes, IP68)
                        <br />
                        Triple-camera system with 12MP Ultra Wide, Wide, and Telephoto
                        cameras; Night mode, Portrait mode, and 4K video up to 60fps
                        <br />
                        12MP TrueDepth front camera with Portrait Mode, 4K video, and
                        Slo-Motion
                    </p>
                </td>
                <td class="category">Technology</td>
                <td>$1495.00</td>
                <td>
                    <input class="productPrice" type="checkbox" name="list_items[]" value="1495.00" />
                </td>
            </tr>

            <!-- SIXTH PRODUCT -->

            <tr>
                <td>
                    <img class="productImage" src="../Shopping_cart/images/Pillows.png" alt="Pillows" />
                </td>
                <td>
                    <h3>Decorative Square Throw Pillow, Pack of 2:</h3>
                    <p>
                        SIZE:20 x 20 Inch / 50 x 50 Cm.Suitable for sofa,bed,home,office.
                        <br />
                        MATERIAL&ZIPPER:Made of Polyester and Cotton Blend.Hidden zipper
                        closure. <br />
                        NOTE:Machine Washable.Pillow covers only(2 pcs), pillow inserts
                        are not included. <br />
                        Due to the production process, pillow cover in different light
                        intensity and angle,so that the product exhibit different colors,
                        this is a normal phenomenon, and not the product quality problems.
                        <br />
                        MIULEE 100% SATISFACTION WARRANTY:Every pillow cover we make
                        delivers premium quality and amazing workmanship. Plus, you get
                        friendly customer service and Miulee 90-Days No Questions Asked
                        Warranty.
                    </p>
                </td>
                <td class="category">Bedding</td>
                <td>$16.99</td>
                <td>
                    <input class="productPrice" type="checkbox" name="list_items[]" value="16.99" />
                </td>
            </tr>
        </table>

        <br />
        <!-- SUBMIT AREA -->


        <div class="bottomBar">
            <button type="submit" name="validate" id="calculate">
                + Add Items to Cart
            </button>
        </div>
    </form>
    <br />

    <footer>
        <p style="text-align: center; color: white">
            Copyright © 2020 emiDev Inc. All rights reserved.
        </p>
    </footer>
</body>

</html>