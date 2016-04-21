<?php
    include 'connectToDB.php';
    $searchQuery = $_POST['login'];
    $query = "SELECT * FROM `users` WHERE `login` LIKE '".$searchQuery."'";
    $result = mysql_query($query);
    $rows = mysql_num_rows($result);

    echo $rows;
