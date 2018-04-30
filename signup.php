<?php
include_once 'header.php';
?>

<section class="main-container">
    <div class="main-wrapper">
        <h2>SIGNUP</h2>
        <form class="signup-form" action="includes/signup.inc.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="first" placeholder="FirstName" required>
            <input type="text" name="last" placeholder="LastName" required>
            <input type="text" name="email" placeholder="E-Mail" required>
            <input type="text" name="uid" placeholder="UserName" required>
            <input type="password" name="pwd" placeholder="Password" required>
            <input type="file" name="picture" id="picture" required>
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </div>
</section>
