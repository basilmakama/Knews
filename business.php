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
        include 'includes/dbh.inc.php';
// sql that fetches the news items from database for the category
        $sql = "SELECT * FROM news WHERE news_category = 'Business'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
// displays the news items on the page
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<h3>" . $row['news_title'] . "</h3>";
                echo "<br>";
                echo "<img src='admin/pictures/" . $row['news_image'] . "'>";
                echo "<br>";
                echo "<p>" . $row['news_body'] . "</p>";
                echo "<br>";
                echo "<div class=\"fb-share-button\" data-href=\"http://localhost:8888/Knews/index.php\" data-layout=\"button_count\" data-size=\"small\" data-mobile-iframe=\"true\"><a target=\"_blank\" href=\"https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8888%2FKnews%2Findex.php&amp;src=sdkpreparse\" class=\"fb-xfbml-parse-ignore\">Share</a></div>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
            }
        }
        ?>




    </div>
</section>
