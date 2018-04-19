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
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<header>
    <nav>
        <div class="main-wrapper">
            <ul>
                <li><a href="index.php">HOME</a> </li>
                <li><a href="worldnews.php">WORLD</a> </li>
                <li><a href="business.php">BUSINESS</a> </li>
                <li><a href="sports.php">SPORTS</a> </li>
            </ul>
            <div class="nav-login">
                <?php
                if (isset($_SESSION['u_id'])){
                    echo "You are logged in!!!";
                    echo '<form action="includes/logout.inc.php" method="POST">
                        <button type="submit" name="submit">LogOut</button>
                        </form>';
                } else {
                    echo '<form action="includes/login.inc.php" method="POST">
                    <input type="text" name="uid" placeholder="Username/E-Mail">
                    <input type="password" name="pwd" placeholder="Password">
                    <button type="submit" name="submit">Login</button>

                </form>
                <a href="admin/admin.php">Admin</a>\';
                <a href="signup.php">SignUp</a>';

                }
                ?>
            </div>
        </div>
    </nav>

</header>