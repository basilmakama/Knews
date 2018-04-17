<?php

session_start();

include '../includes/dbh.inc.php';
  $title = $_POST['title'];
  $body = $_POST['body'];
  $category = $_POST['category'];
  $image= $_POST['image'];


if(!$_POST['submit']){
	// you can remove this echo code and add alert using JS or use required tag in your input feilds.
	
  echo 'All fields must be filled';
  
}

else {
 // insert into tableName (feilds) values (variables) If still you cant understand please check videos on my youtube channel NOSGENE or comment there so i can help you

$sql = /** @lang text */
    "INSERT INTO news (title, body, category, image)
VALUES ('$title', '$body', '$category', '$image')";

if (mysqli_query($conn, $sql)) {
    echo '<h1><center>New record created successfully</center></h1>';
} else {
    echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
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
            <div class="image"><label>SELECT YOUR IMAGE: <br><br> </label><input type="file" name="image" accept="image/*" required</div>
            <br>
            <br>
            <br>
			<input type="submit" name="submit" value="POST NEWS"/></form>
</body>
</html>