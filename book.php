<?php
session_start();
include "config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $flight_id = $_POST['flight_id'];
    $date = date("Y-m-d");

    // Shto rezervimin
    $sql = "INSERT INTO bookings (user_id, flight_id, booking_date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $user_id, $flight_id, $date);
    
    if ($stmt->execute()) {
        echo "Rezervimi u kry me sukses! <a href='my_bookings.php'>Shiko rezervimet</a>";
    } else {
        echo "Gabim: " . $conn->error;
    }
} else {
    header("Location: dashboard.php");
    exit();
}
?>