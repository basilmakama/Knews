<?php

session_start();

if (isset($_POST['submit'])) {

    include '../includes/dbh.inc.php';

    $id = mysqli_real_escape_string($conn, $_POST['admin_id']);
    $login = mysqli_real_escape_string($conn, $_POST['login_id']);
    $password = mysqli_real_escape_string($conn, $_POST['login_password']);
}

if ($row = mysqli_fetch_assoc($result)) {
    //DE-hashing the password
    $hashedPwdCheck = password_verify($password, $row['admin_login_password']);
    if ($hashedPwdCheck == false) {
        header("Location: ../admin/admin.php?login=empty");
        exit();
    } elseif ($hashedPwdCheck == true) {
        //Login the user here
        $_SESSION['a_id'] = $row['admin_id'];
        $_SESSION['a_login'] = $row['login_id'];
        $_SESSION['a_password'] = $row['login_password'];
        header("Location: ../index.php?login=success");
        exit();
    }
}