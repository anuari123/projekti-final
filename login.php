<?php
session_start();
include 'config.php';


if(isset($_POST['login'])){
$email = $_POST['email'];
$password = $_POST['password'];


$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();


if($user && password_verify($password, $user['password'])){
$_SESSION['user_id'] = $user['id'];
header("Location: index.php");
} else {
echo "Login failed!";
}
}
?>