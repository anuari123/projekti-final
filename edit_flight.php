<?php
include "config.php";

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare(
        "UPDATE flights SET origin=?, destination=?, flight_date=?, price=?
         WHERE id=?"
    );
    $stmt->execute([
        $_POST["origin"],
        $_POST["destination"],
        $_POST["date"],
        $_POST["price"],
        $id
    ]);
    header("Location: dashboard.php");
}

$flight = $pdo->prepare("SELECT * FROM flights WHERE id=?");
$flight->execute([$id]);
$f = $flight->fetch();
?>

<form method="POST">
    <input name="origin" value="<?= $f["origin"] ?>"><br>
    <input name="destination" value="<?= $f["destination"] ?>"><br>
    <input type="date" name="date" value="<?= $f["flight_date"] ?>"><br>
    <input name="price" value="<?= $f["price"] ?>"><br>
    <button>Update</button>
</form>
