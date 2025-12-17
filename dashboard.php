<?php
include "config.php";

if ($_SESSION["user"]["role"] != "admin") {
    die("Access denied");
}

$flights = $pdo->query("SELECT * FROM flights")->fetchAll();
?>

<h1>Admin Dashboard</h1>

<a href="add_flight.php">Add Flight</a>

<table border="1">
<tr>
    <th>From</th>
    <th>To</th>
    <th>Date</th>
    <th>Price</th>
    <th>Actions</th>
</tr>

<?php foreach($flights as $f): ?>
<tr>
    <td><?= $f["origin"] ?></td>
    <td><?= $f["destination"] ?></td>
    <td><?= $f["flight_date"] ?></td>
    <td><?= $f["price"] ?> €</td>
    <td>
        <a href="edit_flight.php?id=<?= $f["id"] ?>">Edit</a> |
        <a href="delete_flight.php?id=<?= $f["id"] ?>">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
