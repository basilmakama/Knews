<?php
 
include '../includes/dbh.inc.php';
 error_reporting(0);
  $title = $_POST['title'];
  $body = $_POST['body'];
  $category = $_POST['category'];
    $image = $_POST['image'];


if(!$_POST['submit']){
	// you can remove this echo code and add alert using JS or use required tag in your input feilds.
	
  echo "All fiElds must be filled";
  
}

else {
 // insert into tableName (fields) values (variables)
$sql = "INSERT INTO news (news_title,news_body,news_category,news_image)
VALUES ('$title', '$body', '$category', '$image')";

if (mysqli_query($conn, $sql)) {
    echo "<h1><center>New record created successfully</center></h1>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>

<html>
<head>
<title>Add Data</title>
</head>

<body>

<h2>Add Updates from this menu</h2>
<form action="add.php" method="POST">
    <p>NEWS TITLE</p>
    <label>
        <textarea rows="2" cols="50" name="title" required></textarea>
    </label><br>
    <p>NEWS BODY</p>
    <label>
        <textarea rows="7" cols="50" name="body" required></textarea>
    </label><br>
    <p>NEWS CATEGORY</p>
    <label>
        <select name="category">
            <option value="world">World</option>
            <option value="business">Business</option>
            <option value="sports">Sports</option>
        </select>
    </label><br>
    <br>
    <form action="uploads.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image" id="image">
        <input type="submit" value="Upload NEWS" name="submit">
    </form>    <br>
    <br>
    <br>
    <input type="submit" name="submit" value="POST NEWS"/></form>
</body>

<!--
	Similarly you can make delete and updates pages with little changes in sql query and here and there. If you need to learn those too
	please check my youtube channel NOSGENE as i am running a full stack web development course there right now.
 -->
</html>