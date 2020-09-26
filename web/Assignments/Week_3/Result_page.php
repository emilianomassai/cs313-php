<html>

<body>

    Welcome <?php echo $_POST["full_name"]; ?><br>
    Your email address is: <?php echo $_POST["email"]; ?><br>
    $email = $_POST["email"];
    echo '<a href="mailto:'. $email .' ">' $_POST["email"] '</a>';<br>

    Your major is: <?php echo $_POST["major"]; ?><br>
    Your comments are: <?php echo $_POST["comments"]; ?><br>


</body>

</html>