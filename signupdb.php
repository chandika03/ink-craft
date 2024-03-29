<?php
    session_start();
    include('dbconn.php');
   
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $converted_password = password_hash($password, PASSWORD_DEFAULT);

    if($password == $cpassword){
        $query = ('INSERT INTO users(username, email, password) VALUES (:username, :email, :password)');
        $stmt = $pdo->prepare($query);

        $stmt -> bindParam(':username',$username);
        $stmt -> bindParam(':email',$email);
        $stmt -> bindParam(':password',$password);

        $stmt -> execute(); 
        
        header("Location: /ink-craft/index.php");
    }
    else{
        $invalid = "Password didn't match";
        header("Location: /ink-craft/index.php?invalid=$invalid");
    }
?>
