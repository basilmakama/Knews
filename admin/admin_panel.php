<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" type="text/css" href="styles/style_admin.css">
</head>


<body>



<div id="header">
<center><img src="../images/admin_icon.png">
<h3> Welcome to Admin Panel</h3></center>
</div>

<div id="sidemenu">
 <ul>
    <li><a href="add.php" target="_blank"> Add News Items </a></li>
	<li><a href="delete.php" target="_blank"> Delete News  </a></li>
	<li><a href="manageusers.php" target="_blank"> Delete Users </a></li>
 </ul>
</div>

<div id="data">
<br><br>

<center><h1>Posts</h1></center>
<?php
    include '../includes/dbh.inc.php';

	// displays all the news items currently in the database
	$sql = "SELECT * FROM news";
	$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
   
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID:" . $row["news_id"]. "<br>" . "  Title: " . $row["news_title"].  " <br> " . "<br>";
	 }
} else {
    echo "<h3><center>No news items found!<center></h3>";
}
?>
</div>

<div id="data">
    <br><br>

    <center><h1>Users</h1></center>
    <?php
    include '../includes/dbh.inc.php';

// displays all users currently registered in the database
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            echo "ID:" . $row["user_id"]. "<br>" . "  Name: " . $row["user_uid"].  " <br> " . "<br>";
        }
    } else {
        echo "<h3><center>No user data found!<center></h3>";
    }
    ?>
</div>
</body>
</html>