<?php
session_start();
include 'config.php';

// Nëse përdoruesi nuk është i kyçur, dërgo në login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Marrim ID e fluturimit nga URL
$flight_id = $_GET['id'];

// Marrim të dhënat e fluturimit nga databaza
$stmt = $conn->prepare("SELECT * FROM flights WHERE id = ?");
$stmt->execute([$flight_id]);
$flight = $stmt->fetch();

// Nëse s’gjejmë fluturimin
if (!$flight) {
    echo "Flight not found!";
    exit;
}

// Kur shtypet butoni “Rezervo”
if (isset($_POST['book'])) {
    $seats = $_POST['seats'];
    $user_id = $_SESSION['user_id'];

    // Shtojmë rezervimin në databazë
    $stmt = $conn->prepare("INSERT INTO bookings (user_id, flight_id, seats) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $flight_id, $seats]);

    // Kthehet te faqja e rezervimeve
    header("Location: my_bookings.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rezervo Biletë</title>
</head>
<body>

<h2>Rezervimi i Fluturimit</h2>

<p><strong>Prej:</strong> <?= $flight['origin'] ?></p>
<p><strong>Deri:</strong> <?= $flight['destination'] ?></p>
<p><strong>Data:</strong> <?= $flight['flight_date'] ?></p>
<p><strong>Çmimi:</strong> <?= $flight['price'] ?> €</p>

<form method="POST">
    <label>Numri i ulëseve:</label>
    <input type="number" name="seats" required min="1">
    <br><br>
    <button type="submit" name="book">Rezervo</button>
</form>

</body>
</html>
