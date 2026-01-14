<?php
session_start();
include "config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Merr të dhënat e përdoruesit
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - FlyWorld</title>
    <style>
        body { font-family: Arial; margin: 0; padding: 20px; background: #f0f8ff; }
        .header { background: #007bff; color: white; padding: 20px; border-radius: 10px; margin-bottom: 20px; }
        .welcome { font-size: 24px; }
        .logout { float: right; background: white; color: #007bff; padding: 10px 20px; border-radius: 5px; text-decoration: none; }
        .flights-container { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; }
        .flight-card { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .book-btn { background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; }
        .book-btn:hover { background: #218838; }
    </style>
</head>
<body>
    <div class="header">
        <a href="logout.php" class="logout">Dil</a>
        <div class="welcome">Mirë se vini, <?php echo $user_name; ?>!</div>
        <p>Këtu mund të shikoni dhe rezervoni fluturimet</p>
    </div>

    <h2>Fluturimet e disponueshme</h2>
    
    <div class="flights-container">
        <?php
        // Merr të gjitha fluturimet nga databaza
        $sql = "SELECT * FROM flights ORDER BY departure_date";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($flight = $result->fetch_assoc()) {
                echo '
                <div class="flight-card">
                    <h3>' . $flight['from_city'] . ' → ' . $flight['to_city'] . '</h3>
                    <p><strong>Data:</strong> ' . $flight['departure_date'] . '</p>
                    <p><strong>Çmimi:</strong> $' . $flight['price'] . '</p>
                    <p><strong>Vende:</strong> ' . $flight['seats'] . '</p>
                    
                    <form action="book.php" method="POST">
                        <input type="hidden" name="flight_id" value="' . $flight['id'] . '">
                        <button type="submit" class="book-btn">Rezervo Biletën</button>
                    </form>
                </div>';
            }
        } else {
            echo '<p style="color: red; grid-column: 1/-1;">Nuk ka fluturime të disponueshme momentalisht.</p>';
        }
        ?>
    </div>
    
    <div style="margin-top: 30px;">
        <a href="my_bookings.php" style="background: #6c757d; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Shiko rezervimet e mia</a>
        <a href="index.php" style="background: #17a2b8; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; margin-left: 10px;">Kthehu në faqen kryesore</a>
    </div>
</body>
</html>