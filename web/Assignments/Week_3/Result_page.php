<html>

<body>
    <?php $email = $_POST["email"]?>
    Welcome <?php echo $_POST["full_name"]; ?><br>
    Your email address is: <?php echo "<a href= 'mailto: $email';> $email</a>"; ?><br>

    Your major is: <?php echo $_POST["major"]; ?><br>
    Your comments are: <?php echo $_POST["comments"]; ?><br>

    You visited: <?php
$continents_Array = $_POST['cont_list'];
if (!empty($continents_Array)) {
// Loop to store and display values of individual checked checkbox.

    foreach ($continents_Array as $selected => $element) {
        switch ($selected) {
            case NA:
                echo "North America";
                break;
            case SA:
                echo "South America";
                break;
            case EU:
                echo "Europe";
                break;
            case AI:
                echo "Asia";
                break;
            case AU:
                echo "Australia";
                break;
            case AF:
                echo "Africa";
                break;
            case AN:
                echo "Antarctica";
                break;
        }

        // if the checked value is the last, add a period instead of a comma.

        if ($selected === array_key_last($continents_Array)) {

            echo '.';
        } else {
            echo ', ';
        }
    }
}

?>

</body>

</html>