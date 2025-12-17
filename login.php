<?php
include "config.php";

if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: index.php");
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user"] = $user;
        header("Location: index.php");
    } else {
        $message = "Login failed!";
    }
}
?>

<h2>Login</h2>

<form method="POST">
    <input type="email" name="email" required><br><br>
    <input type="password" name="password" required><br><br>
    <button>Login</button>
</form>

<p><?= $message ?></p>
