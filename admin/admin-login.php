<?php

session_start();

if (isset($_POST['submit'])){
    include '../includes/dbh.inc.php';

$aname = mysqli_real_escape_string($conn, $_POST['aname']);
$apass = mysqli_real_escape_string($conn, $_POST['apass']);


//Error handlers
    //Check if empty

    if (empty($aname) || empty($apass)){
        header("Location: ../admin/admin.php?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM admin WHERE admin_name='$aname' AND admin_password='$apass'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1){
            header("Location: ../admin/admin.php?login=error");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)){
                //Password
                 if ($apass == false){
                     header("Location: ../admin/admin.php?login=error");
                     exit();
                 } elseif ($apass == true){
                     //Login in the admin here
                     $_SESSION['a_name']= $row['admin_name'];
                     header("Location: admin_panel.php");
                     exit();
                 }
            }
        }
    }
} else {
    header("Location: ../admin.php?login=error");
    exit();
}