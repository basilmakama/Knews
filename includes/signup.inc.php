<?php

if(isset($_POST['submit'])){

    include_once 'dbh.inc.php';


    $target_dir = "userpictures/";
    $target_files = $target_dir . basename($_FILES['picture']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_files,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES['picture']["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    if (move_uploaded_file($_FILES["picture"]["tmp_name"],$target_files)) {
        echo "The file" . basename($_FILES["picture"]["name"]) . "has been uplaoded.";
    } else {
        echo "";
    }




    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $pics = $target_files;





    //Error Handlers
    //Checks for empty fields

    if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)){
        header("Location: ../signup.php?signup=empty");
        exit();
    } else{
        //Check if input characters are valid
        if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
            header("Location: ../signup.php?signup=invalid");
            exit();
        } else{
            //Check if email exists
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../signup.php?signup=email");
                exit();
            } else{
                $sql = "SELECT * FROM users WHERE user_id = '$uid'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck > 0){
                    header("Location: ../signup.php?signup=usertaken");
                    exit();
                } else{
                    //Hashing the password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //Insert the user into the database
                    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid,user_image, user_pwd) VALUES ('$first','$last','$email','$uid','$pics','$hashedPwd');";
                    $result = mysqli_query($conn, $sql);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }

}   else{
    header("Location: ../signup.php");
    exit();
}