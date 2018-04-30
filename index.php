<?php
include_once 'header.php';
include 'includes/dbh.inc.php';

session_start();


?>

<section class="main-container">
    <div class="main-wrapper">
        <h2>HOME</h2>
        <br>
        <br>
        <br>

        <?php

        if (isset($_SESSION['u_id'])){}
        include 'includes/dbh.inc.php';

        $sql = "SELECT * FROM news ORDER BY news_id DESC";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<h3><center>" . $row['news_title'] . "</center></h3>";
                echo "<br>";
                echo "<center><img src='admin/{$row['news_image']}'></center>";
                echo "<br>";
                echo "<p><center>" . $row['news_body'] . "</center></p>";
                echo "<br>";
                echo "<p><center> Source: " . $row['news_source'] . "</center></p>";
                echo "<br>";
                echo "<center><div class=\"fb-share-button\" data-href=\"http://localhost:8888/Knews/index.php\" data-layout=\"button_count\" data-size=\"small\" data-mobile-iframe=\"true\"><a target=\"_blank\" href=\"https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8888%2FKnews%2Findex.php&amp;src=sdkpreparse\" class=\"fb-xfbml-parse-ignore\">Share</a></center></div>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
            }
        }

        ?>




    </div>
    <!-- Footer bar, will always stay at the bottom of the page -->

</section>

<footer>
<p>Created by Basil Makama</p>
    <p>Copyright 2018</p>
</footer>
             