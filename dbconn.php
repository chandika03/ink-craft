<?php
    $host="localhost";
    $user="root";
    $pass="";
    $db="ink-craft";
    $dsn="mysql:host=$host;dbname=$db;";
    $pdo=new PDO($dsn,$user,$pass);

    // if($pdo){
    //     echo "hello";

    // }
?>