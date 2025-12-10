<?php
session_start();
include 'config.php';


$stmt = $conn->prepare("SELECT * FROM flights");
$flights = $stmt->fetchAll();
?>

<a href="book.php?id=<?= $f['id'] ?>">Book</a>
<h2>Fluturimet</h2>
<table border="1">
<tr>
<th>Origin</th> <th>Destination</th> <th>Date</th> <th>Price</th> <th>Action</th>
</tr>
<?php foreach($flights as $f): ?>
<tr>
<td><?= $f['origin'] ?></td>
<td><?= $f['destination'] ?></td>
<td><?= $f['flight_date'] ?></td>
<td><?= $f['price'] ?></td>
<td><a href="book.php?id=<?= $f['id'] ?>">Book</a></td>
</tr>
<?php endforeach; ?>
</table>