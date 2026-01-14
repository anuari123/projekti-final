<?php
session_start();
include 'config.php';


$stmt = $conn->prepare("SELECT * FROM flights");
$stmt->execute();
$flights = $stmt->fetchAll();
?>


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

<!-- FORMA E REGJISTRIMIT -->
<form action="signup.php" method="POST">
    <h2>Regjistrohu</h2>
    <input type="text" name="name" placeholder="Emri i plotë" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Regjistrohu</button>
</form>
