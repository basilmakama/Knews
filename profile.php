<?php
session_start();

include 'includes/dbh.inc.php';

include_once 'header.php';
error_reporting(0);


$email = $_POST['email'];
$uid =  $_POST['uid'];
$pwd = $_POST['password'];
$id = $_POST['user_id'];


if(!$_POST['submit']){

    $_SESSION['u_uid'] =['user_uid'];
    $_SESSION['u_first'] =['user_first'];
    $_SESSION['u_id'] = ['user_id'];


}

else {
    // deletes news items from the database and website
    $sql = "UPDATE users SET user_email = '$email' AND user_uid = '$uid'  WHERE user_id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<h1><center>Records Updated</center></h1>";
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

<h2>Update Profile</h2>
<form action="profile.php" method="POST">
    <p>UPDATE EMAIL</p>
    <label>
        <textarea rows="2" cols="50" name="email"></textarea>
    </label><br>
    <p>UPDATE USERNAME</p>
    <label>
        <textarea rows="2" cols="50" name="uid"></textarea>
    </label><br>
    <input type="submit" name="submit" value="UPDATE RECORDS"/></form>


<div></div>
</body>
</html>
