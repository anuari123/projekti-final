<?php
include 'config.php';
$id = $_GET['id'];

INSERT INTO flights (flight_number, departure, destination, departure_time, arrival_time, seats_available, price) VALUES
('AL123', 'Tirana', 'Rome', '2025-12-15 10:00:00', '2025-12-15 12:00:00', 50, 100.00),
('AL456', 'Rome', 'Paris', '2025-12-16 08:00:00', '2025-12-16 10:30:00', 60, 150.00),
('AL789', 'Paris', 'Berlin', '2025-12-17 14:00:00', '2025-12-17 16:00:00', 70, 120.00);

$stmt = $conn->prepare("SELECT * FROM flights WHERE id=?");
$stmt->execute([$id]);
$flight = $stmt->fetch();





if(isset($_POST['update'])){
$stmt = $conn->prepare("UPDATE flights SET origin=?, destination=?, flight_date=?, price=? WHERE id=?");
$stmt->execute([$_POST['origin'], $_POST['destination'], $_POST['date'], $_POST['price'], $id]);
header("Location: dashboard.php");
}
?>