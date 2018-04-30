<?php
//connect to the database

    include '../includes/dbh.inc.php';

    $target_dir = "pictures/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
$check = getimagesize($_FILES['image']["tmp_name"]);
if($check !== false) {
echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
} else {
echo "File is not an image.";
    $uploadOk = 0;
}
}
if (move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)) {
        echo "The file" . basename($_FILES["image"]["name"]) . "has been uplaoded.";
    } else {
        echo "";
    }




    //Get all the submitted data from the form
    $title = $_POST['title'];
    $body = $_POST['body'];
    $category = $_POST['category'];
    $source = $_POST['source'];
    $image = $target_file;

if(!$_POST['submit']){


}

else {


    $sql = "INSERT INTO news (news_title,news_body,news_category,news_source,news_image)
VALUES ('$title', '$body', '$category','$source', '$image')";

    if (mysqli_query($conn, $sql)) {
        echo "<h1><center>New Record Entered into Database</center></h1>";
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
<form action="adds.php" method="POST" enctype="multipart/form-data">
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
    <p>NEWS SOURCE</p>
    <label>
        <textarea rows="2" cols="50" name="source" required></textarea>
    </label><br>
    <br>
    <p>NEWS IMAGE</p>
        <input type="file" name="image" id="image">
        <br>
    <br>
    <BR>
    <input type="submit" name="submit" value="POST NEWS"/></form>
</body>