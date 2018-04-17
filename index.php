<?php
include_once 'header.php';

session_start();


?>

<section class="main-container">
<div class="main-wrapper">
    <h2>HOME</h2>
    <?php

    if (isset($_SESSION['u_id'])){
        echo "You are logged in!!!";
    }


    $sql= 'SELECT * FROM news;';
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo $row['news_title'];
        }
    }

    ?>

</div>
</section>
             