<?php
    include 'connectToDB.php';
    session_start();
    if($_SESSION['name']) {
        $query = "SELECT id, notename, text FROM `usernotes` WHERE `login` LIKE '".$_SESSION['name']."'";
        $notes = mysql_query($query);
        $final = '';
        while($row = mysql_fetch_assoc($notes)) {
            $final .= $row['notename']."===".$row['text']."===".$row['id']."===";
        }
        echo $final;
    }
    else echo 'false';
