<?php

     include 'connectToDB.php';
     $pass = md5($_POST['password']);
     $query = "INSERT INTO `Notes`.`users` (`login`, `pass`) VALUES ('".$_POST['login']."', '".$pass."');";
     mysql_query($query);


     exit();


