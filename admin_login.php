<?php

session_start();

if (isset($_POST['submiy'])){

    include 'includes/dbh.inc.php';

    $adminid = mysqli_real_escape_string($conn, $_POST['adminid']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //Error handlers

    if (empty($adminid) || empty($password)){
        header("Location: ../admin/admin.php?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM admin WHERE admin_loginid='$adminid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1){
            header("Location: ../admin/admin.php?login=error");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)){
                $passwordCheck = password_verify($password, $row['admin_password']);
                if($passwordCheck == false) {
                    header("Location: ../admin/admin.php?login=error");
                    exit();
                } elseif ( $passwordCheck == true){
                    //LOGIN THE USER HERE
                    $_SESSION['p_id'] = $row['admin_id'];
                    $_SESSION['p_login'] = $row['admin_loginid'];
                    header("Location: ../admin/admin_panel.php");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../admin/admin.php?login=error");
    exit();
}


