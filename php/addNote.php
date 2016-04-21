<?php
    include 'connectToDB.php';
    session_start();
    $login = $_SESSION['name'];
    $noteName = $_POST['notename'];
    $text = $_POST['text'];
    $query = "INSERT INTO `usernotes` (`id`,`login`, `notename`, `text`) VALUES (NULL, '".$login."', '".$noteName."', '".$text."')";
    $result = mysql_query($query);
    echo $result;
