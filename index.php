<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flight Booking Agency</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
            url('https://images.unsplash.com/photo-1504196606672-aef5c9cefc92') center/cover;
            color: white;
            padding: 120px 0;
        }
        .destination-card img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<!-- 🔹 NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">✈️ FlyWorld</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <?php if(isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="user/flights.php">Fluturimet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user/my_bookings.php">Rezervimet e mia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="auth/logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="auth/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="auth/register.php">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- 🔹 HERO SECTION -->
<section class="hero text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Explore the World with FlyWorld</h1>
        <p class="lead mt-3">
            Rezervo bileta ajrore drejt destinacioneve më të bukura në botë  
            – shpejt, sigurt dhe me çmime të përballueshme.
        </p>
        <a href="user/flights.php" class="btn btn-warning btn-lg mt-4">
            Rezervo Biletën Tani
        </a>
    </div>
</section>

<!-- 🔹 DESTINATIONS -->
<section class="container my-5">
    <h2 class="text-center mb-4">🌍 Destinacione Popullore</h2>

    <div class="row g-4">

        <?php
        $destinations = [
            ["Paris", "Qyteti i dashurisë dhe artit.", "https://images.unsplash.com/photo-1502602898657-3e91760cbb34"],
            ["New York", "Qyteti që nuk fle kurrë.", "https://images.unsplash.com/photo-1549924231-f129b911e442"],
            ["Tokyo", "Traditë dhe teknologji moderne.", "https://images.unsplash.com/photo-1549692520-acc6669e2f0c"],
            ["Dubai", "Luks, arkitekturë dhe aventura.", "https://images.unsplash.com/photo-1504274066651-8d31a536b11a"],
            ["Rome", "Histori, kulturë dhe ushqim.", "https://images.unsplash.com/photo-1526481280690-7ead44c1f78c"]
        ];

        foreach($destinations as $d):
        ?>
        <div class="col-md-4">
            <div class="card destination-card shadow-sm">
                <img src="<?= $d[2] ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $d[0] ?></h5>
                    <p class="card-text"><?= $d[1] ?></p>
                    <a href="user/flights.php" class="btn btn-primary w-100">
                        Shiko Fluturimet
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</section>

<!-- 🔹 ABOUT -->
<section class="bg-white py-5">
    <div class="container text-center">
        <h2>✈️ Pse FlyWorld?</h2>
        <p class="mt-3">
            FlyWorld është një agjenci digjitale për rezervimin e biletave ajrore.
            Ne ofrojmë fluturime drejt destinacioneve më të bukura në botë,
            me një sistem të thjeshtë dhe të sigurt për përdoruesit tanë.
        </p>
    </div>
</section>

<!-- 🔹 FOOTER -->
<footer class="bg-dark text-white text-center py-3">
    <p class="mb-0">© 2025 FlyWorld | All Rights Reserved</p>
</footer>

</body>
</html>
