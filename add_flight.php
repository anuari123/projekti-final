<?php
include 'config.php';


if(isset($_POST['add'])){
$stmt = $conn->prepare("INSERT INTO flights (origin, destination, flight_date, price) VALUES (?, ?, ?, ?)");
$stmt->execute([ $_POST['origin'], $_POST['destination'], $_POST['date'], $_POST['price'] ]);


header("Location: dashboard.php");
}
?>