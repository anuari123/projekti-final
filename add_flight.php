<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare(
        "INSERT INTO flights (origin,destination,flight_date,price)
         VALUES (?,?,?,?)"
    );
    $stmt->execute([
        $_POST["origin"],
        $_POST["destination"],
        $_POST["date"],
        $_POST["price"]
    ]);
    header("Location: dashboard.php");
}
?>

<h2>Add Flight</h2>

<form method="POST">
    <input name="origin" placeholder="From"><br>
    <input name="destination" placeholder="To"><br>
    <input type="date" name="date"><br>
    <input type="number" name="price"><br>
    <button>Add</button>
</form>
