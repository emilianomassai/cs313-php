<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
</head>


<body>

    <form action="" method="post">
        Book:
        <input type=text name="Book">
        <br>
        Chapter:
        <input type=text name="Chapter">
        <br>
        Verse:
        <input type=text name="Verse">
        <br>
        Content:
        <input type=text name="Verse">
        <br>
        <br>
        <input type=submit name="Add S">
        <?php
if (isset($_POST['s'])) {
    $a = $_POST['t1']; //accessing value from the text field
    echo "The name of the person is:-" . $a; //displaying result
}
?>

    </form>
    <div>
        <a href="../../Home_Page/assignments.php" id="CS313_assignments_btn_id">
            Go to the CS313 Assignment's page
        </a>
    </div>

    <footer>
        <p style="text-align: center;">
            Copyright © 2020 emiDev Inc. All rights reserved.
        </p>
    </footer>
</body>

</html>