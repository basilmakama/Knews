<?php

session_start();

?>




<?php
include_once '/header.php';
?>

<section class="main-container">
    <div class="main-wrapper">
        <h2>ADMINISTRATOR</h2>
        <br>

<?php
if (isset($_SESSION['admin_login_id'])){
    echo '<form action="../includes/logout.inc.php" method="POST">
                        <button type="submit" name="submit">LogOut</button>
                        </form>';
} else {
    echo '<form action="admin_panel.php" method="POST">
                    <input type="text" name="login_id" placeholder="Admin Username">
                    <input type="password" name="admin_password" placeholder="Password">
                    <button type="submit" name="submit">Login</button>
                </form>';

}
?>