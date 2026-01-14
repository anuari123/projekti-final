<?php
session_start();
include "config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Rezervimet e mia</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .booking { background: #e9ecef; padding: 15px; margin: 10px 0; border-radius: 5px; }
    </style>
</head>
<body>
    <h2>Rezervimet e mia</h2>
    <a href="dashboard.php">← Kthehu te fluturimet</a>
    
    <?php
    // Merr rezervimet e përdoruesit
    $sql = "SELECT b.*, f.from_city, f.to_city, f.price, f.departure_date 
            FROM bookings b 
            JOIN flights f ON b.flight_id = f.id 
            WHERE b.user_id = ? 
            ORDER BY b.booking_date DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="booking">
                <h4>' . $row['from_city'] . ' → ' . $row['to_city'] . '</h4>
                <p><strong>Data e fluturimit:</strong> ' . $row['departure_date'] . '</p>
                <p><strong>Data e rezervimit:</strong> ' . $row['booking_date'] . '</p>
                <p><strong>Çmimi:</strong> $' . $row['price'] . '</p>
            </div>';
        }
    } else {
        echo '<p>Ju nuk keni asnjë rezervim.</p>';
    }
    ?>
</body>
</html>