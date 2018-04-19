<?php

include '../includes/dbh.inc.php';
error_reporting(0);

$id= $_POST['id'];
$title = $_POST['title'];
$body = $_POST['body'];
$category = $_POST['category'];
$image = $_POST['image'];


if(!$_POST['submit']){


}

else {
    // deletes news items from the database and website
    $sql = "DELETE FROM news WHERE news_id = {$id}";

    if (mysqli_query($conn, $sql)) {
        echo "<h1><center>News record deleted from database</center></h1>";
    } else {
        echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
    }
}
?>

<html>
<head>
    <title>Delete Data</title>
</head>

<body>

<h2>Delete News From Website</h2>
<form action="delete.php" method="POST">
    <p>NEWS ID</p>
    <label>
        <textarea rows="2" cols="50" name="id" required></textarea>
    </label><br>
    <input type="submit" name="submit" value="DELETE NEWS"/></form>
</body>
</html>

