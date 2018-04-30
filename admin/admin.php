<?php

session_start();
?>



<section class="main-container">
    <div class="main-wrapper">
        <h2>ADMINISTRATOR</h2>
        <br>

<form action=admin-login.php method="POST">
                    <input type="text" name="aname" placeholder="Admin Username">
                    <input type="password" name="apass" placeholder="Password">
                    <button type="submit" name="submit">Login</button>
                </form>
    </div>
</section>