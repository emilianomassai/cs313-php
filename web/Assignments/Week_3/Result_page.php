<html>

<body>
    <?php $email = $_POST["email"]?>
    Welcome <?php echo $_POST["full_name"]; ?><br>
    Your email address is: <?php echo "<a href= 'mailto: $email';> $email</a>"; ?><br>

    Your major is: <?php echo $_POST["major"]; ?><br>
    Your comments are: <?php echo $_POST["comments"]; ?><br>

    You visited <?php
if (isset($_POST['submit'])) { //to run PHP script on submit
    if (!empty($_POST['cont_list'])) {
// Loop to store and display values of individual checked checkbox.
        foreach ($_POST['cont_list'] as $selected) {
            echo $selected . "</br>";
        }
    }
}
?>

</body>

</html>