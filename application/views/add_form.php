<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Notes</title>
</head>
<body>


<!-- Create HTML form for new note -->
<form action="insert.php" method="post">
<?php

echo "<br><br><label for='subject'>Subject</label>";
echo "<br><input type='text' name='subject'>";
echo "<br><br><label for='details'>Details</label>";
echo "<br><textarea name='details' cols='50' rows='5'></textarea>";
echo "<br><br><label for='subject'>Sorting</label>";
echo "<br><input type='text' name='sorting'>";
echo "<br><br><input type='submit' value='Save' />";
echo "<br><br><br>";

?>
</form>
<a href="index.php">Back</a>
</body>
</html>
