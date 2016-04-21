<?php
    include 'connectToDB.php';
    $id = $_POST['id'];
    $name = $_POST['notename'];
    $text = $_POST['text'];
    $query = "UPDATE `usernotes` SET `notename`='".$name."' ,`text`='".$text."' WHERE `id` LIKE '".$id."'";
    $result = mysql_query($query);
    echo mysql_num_rows($result);
