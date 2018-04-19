<?php
$target_dir = "pictures/";
$target_file = $target_dir . basename($_FILES["image"]["image"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//Checks if image file is an actual image or fake

if (isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false){
        echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
} else{
    echo "File is not an image.";
    $uploadOk = 0;
}

}

// Checks if file already exists

if (file_exists($target_file)){
    echo "Sorry file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"]>500000){
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

//Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
//Check if $uploadok is set to 0 by an error
if ($uploadOk == 0){
    echo "Sorry, your file was not uploaded.";
} else{
    if (move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)) {
        echo "The file" . basename($_FILES["image"]["image"]) . "has been uplaoded.";
    } else {
        echo "Sorry, there was an error in uploading your file.";
    }
}
    ?>