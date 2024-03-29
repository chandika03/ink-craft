<?php
session_start();
include('dbconn.php');

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT id, username, password FROM users WHERE username = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$username]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user['id'];
    header("Location: /ink-craft/homepage.php");
    exit();
} else {
    // User not found or password incorrect
    $invalid = "Invalid credentials!";
    header("Location: /INK-CRAFT/index.php?invalid=$invalid");
    exit();
}
?>
