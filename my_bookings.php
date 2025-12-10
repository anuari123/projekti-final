<?php
session_start();
include 'config.php';


$stmt = $conn->prepare("SELECT * FROM bookings WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$bookings = $stmt->fetchAll();
?>