<?php

     include 'connectToDB.php';
     $pass = $_POST['password'];
     $query = "INSERT INTO `Notes`.`users` (`login`, `pass`) VALUES ('".$_POST['login']."', '".$pass."');";
     mysql_query($query);


     exit();


