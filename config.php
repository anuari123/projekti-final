<?php
 // Shtoje këtë në fillim të config.php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "db"; // Ndrysho nëse databaza jote ka emër tjetër

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Gabim ne lidhje me databaze: " . mysqli_connect_error());
}
?>