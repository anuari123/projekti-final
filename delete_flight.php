<?php
include 'config.php';
$id = $_GET['id'];


$stmt = $conn->prepare("DELETE FROM flights WHERE id = ?");
$stmt->execute([$id]);


header("Location: dashboard.php");
?>