<html>

<body>
    <?php $email = $_POST["email"]?>
    Welcome <?php echo $_POST["full_name"]; ?><br>
    Your email address is: <?php echo "<a href= 'mailto: $email';> $email</a>"; ?><br>

    Your major is: <?php echo $_POST["major"]; ?><br>
    Your comments are: <?php echo $_POST["comments"]; ?><br>

    You visited: <?php
if (!empty($_POST['cont_list'])) {
// Loop to store and display values of individual checked checkbox.
    foreach ($_POST['cont_list'] as $selected) {

        echo $selected . ", ";
    }
}

// if the checked value is the last, add a period instead of a comma.
if (array_key_last($_POST['cont_list'])) {
    echo $selected . ".";
}

?>

</body>

</html>