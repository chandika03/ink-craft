<?php
    include('dbconn.php');
    session_start();

   
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if($password == $cpassword){
        $query = ('INSERT INTO users(username, email, password) VALUES (:uname, :email, :password)');
        $stmt = $pdo->prepare($query);

        $stmt -> bindParam(':uname',$uname);
        $stmt -> bindParam(':email',$email);
        $stmt -> bindParam(':password',$password);

        $stmt -> execute(); 
    }
    else{
        $invalid = "Password didn't match";
        header("Location: /ink-craft/index.php?invalid=$invalid");
    }
?>
