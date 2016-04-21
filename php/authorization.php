<?php
    include 'connectToDB.php';
    $login = $_POST['login'];
    $pass = md5($_POST['password']);
    $query= "SELECT * FROM users WHERE login = '".$login."' AND pass = '".$pass."'";

    $result = mysql_query($query);
    //$result = mysql_fetch_array($result);

    if(mysql_num_rows($result) != 0) {
        session_start();
        $_SESSION['name'] = $login;


    }
    else echo 'false';
