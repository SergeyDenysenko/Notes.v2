<?php
    include 'connectToDB.php';
    $cont = $_POST['elem'];
    $query = "DELETE FROM `Notes`.`usernotes` WHERE `usernotes`.`id` = '".$cont."'";
    $result = mysql_query($query);
    if($result) echo 'true';
    else echo 'false';
