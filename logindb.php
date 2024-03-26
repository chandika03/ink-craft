<?php
    include('dbconn.php');
    session_start();
    $uname = $_POST['uname'];
    $password = $_POST['password'];

    $query = ('SELECT id, username, password FROM users');
    $stmt = $pdo->prepare($query);
    $stmt -> execute();

    $value = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($value as $item){
        if($uname == $item['username'] && password_verify($password, $item['password'])){
            $_SESSION['user'] = $item['user_id'];
            //echo $_SESSION['user']; //checked to see if session is set or not
            header("Location: /ink-craft/homepage.php");
        }
    }
    if(empty($_SESSION['user'])){//user not found
        $invalid = "Invalid credentials!";
        header("Location: /ink-craft/login.php?invalid= $invalid");
    }

?>