<?php
include "config.php";
$id = $_GET["id"];
$pdo->prepare("DELETE FROM flights WHERE id=?")->execute([$id]);
header("Location: dashboard.php");
