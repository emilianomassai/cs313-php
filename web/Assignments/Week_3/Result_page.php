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

        // if the checked value is the last, add a period instead of a comma.

        switch ($selected) {
            case NA:
                $element = "North America";
                break;
            case SA:
                $element = "South America";
                break;
            case EU:
                $element = "Europe";
                break;
            case AI:
                $element = "Asia";
                break;
            case AU:
                $element = "Australia";
                break;
            case AF:
                $element = "Africa";
                break;
            case AN:
                $element = "Antarctica";
                break;
        }

        if ($selected === array_key_last($continents_Array)) {
            echo $element . '.';
        } else {
            echo $element . ', ';
        }
    }
}

?>

</body>

</html>