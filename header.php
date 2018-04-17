<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
    <nav>
        <div class="main-wrapper">
            <ul>
                <li><a href="index.php">HOME</a> </li>
                <li><a href="#">WORLD</a> </li>
                <li><a href="#">BUSINESS</a> </li>
                <li><a href="#">SPORTS</a> </li>
            </ul>
            <div class="nav-login">
                <?php
                if (isset($_SESSION['u_id'])){
                    echo '<form action="includes/logout.inc.php" method="POST">
                        <button type="submit" name="submit">LogOut</button>
                        </form>';
                } else {
                    echo '<form action="includes/login.inc.php" method="POST">
                    <input type="text" name="uid" placeholder="Username/E-Mail">
                    <input type="password" name="pwd" placeholder="Password">
                    <button type="submit" name="submit">Login</button>
                </form>
                <a href="signup.php">SignUp</a>';

                }
                ?>
                <a href="admin/admin.php">Admin</a>';

            </div>
        </div>
    </nav>

</header>