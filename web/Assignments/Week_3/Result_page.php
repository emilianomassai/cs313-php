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
                $selected = "North America";
                break;
            case SA:
                $selected = "South America";
                break;
            case EU:
                $selected = "Europe";
                break;
            case AI:
                $selected = "Asia";
                break;
            case AU:
                $selected = "Australia";
                break;
            case AF:
                $selected = "Africa";
                break;
            case AN:
                $selected = "Antarctica";
                break;
        }

        // if the checked value is the last, add a period instead of a comma.

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