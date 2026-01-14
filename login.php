
<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            
            // Ridrejto në dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Password gabim! <a href='index.php'>Provoni përsëri</a>";
        }
    } else {
        echo "User nuk ekziston! <a href='index.php'>Regjistrohu këtu</a>";
    }
} else {
    header("Location: index.php");
    exit();
}
?>