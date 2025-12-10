<?php
$dsn = "mysql:host=localhost;dbname=airline_project";
$user = "root";
$pass = "";


try {
$conn = new PDO($dsn, $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
die("Database error: " . $e->getMessage());
}
?>