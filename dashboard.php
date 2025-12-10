<?php
include 'config.php';
$stmt = $conn->prepare("SELECT * FROM flights");
stmt->execute();
$flights = $stmt->fetchAll();
?>