<html>

<body>
    <?php $email = $_POST["email"]?>
    Welcome <?php echo $_POST["full_name"]; ?><br>
    Your email address is: <?php echo $email; ?><br>

    <?php echo "<a href= mailto: {$email} > .$email<\a>"; ?>

    Your major is: <?php echo $_POST["major"]; ?><br>
    Your comments are: <?php echo $_POST["comments"]; ?><br>


</body>

</html>