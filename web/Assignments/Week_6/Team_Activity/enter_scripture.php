<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
</head>


<body>

    <form action="insertTopic.php" method="post">
        <input type="text" id="txtBook" name="txtBook"></input>
        <label for="txtBooK">Book</label>
        <br /><br />

        <input type="text" id="txtChapter" name="txtChapter"></input>
        <label for="txtChapter">Chapter</label>
        <br /><br />

        <input type="text" id="txtVerse" name="txtVerse"></input>
        <label for="txtVerse">Verse</label>
        <br /><br />

        <label for="txtContent">Content:</label><br />
        <textarea id="txtContent" name="txtContent" rows="4" cols="50"></textarea>
        <br /><br />

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