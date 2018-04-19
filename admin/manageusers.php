<?php

include '../includes/dbh.inc.php';
error_reporting(0);

$id= $_POST['id'];

if(!$_POST['submit']){

}

else {
    // delete users from the database
    $sql = "DELETE FROM users WHERE user_id = {$id}";

    if (mysqli_query($conn, $sql)) {
        echo "<h1><center>News record deleted from database</center></h1>";
    } else {
        echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
    }
}

?>

<html>
<head>
    <title>Delete Users</title>
</head>

<body>

<h2>Delete Users From Website</h2>
<form action="manageusers.php" method="POST">
    <p>USER ID</p>
    <label>
        <textarea rows="2" cols="50" name="id" required></textarea>
    </label><br>
    <input type="submit" name="submit" value="DELETE USERS"/></form>


</body>
</html>