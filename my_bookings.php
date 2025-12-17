<?php
include "config.php";

$user_id = $_SESSION["user"]["id"];

$stmt = $pdo->prepare(
"SELECT flights.origin, flights.destination, flights.flight_date
 FROM bookings
 JOIN flights ON bookings.flight_id = flights.id
 WHERE bookings.user_id=?"
);
$stmt->execute([$user_id]);
$bookings = $stmt->fetchAll();
?>

<h2>My Bookings</h2>

<ul>
<?php foreach($bookings as $b): ?>
    <li><?= $b["origin"] ?> → <?= $b["destination"] ?> (<?= $b["flight_date"] ?>)</li>
<?php endforeach; ?>
</ul>
