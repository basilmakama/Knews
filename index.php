<?php
include_once 'header.php';

include 'includes/dbh.inc.php';

session_start();


?>

<section class="main-container">
<div class="main-wrapper">
    <h2>HOME</h2>
    <?php

    if (isset($_SESSION['u_id'])){}

    $sql = "SELECT * FROM news ORDER BY 'news_id' ASC ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            echo $row["news_title"]. "<br><br>"  . $row["news_image"].  " <br><br> " .$row["news_body"]. "<br><br>";
        }
    } else {
        echo "<h3><center>No news items found!<center></h3>";
    }

    ?>

</div>
</section>
             