<?php
include '../session/session.php';
include '../connection/conn.php';
// include '../partials/navbar.php';

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Showroom</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #0D0D0D;
            /* Dark background for modern look */
            color: #fff;
            margin: 0;
            padding: 0;
        }

        /* navbar */
        nav {
            background-color: #ffffff;
            /* Light background */
            color: #333;
            /* Dark text */
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 60px;
            border-bottom: 2px solid #c8102e;
            /* Red Bull Red */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            margin-bottom: 20px;
        }

        .logo img {
            width: 100px;
            /* Adjusted size for better appearance */
            height: auto;
            /* Maintain aspect ratio */
        }

        nav h1 {
            margin: 0;
            font-size: 24px;
            color: #c8102e;
            /* Red Bull Red for the title */
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            /* Align items vertically */
        }

        nav li {
            margin-right: 20px;
        }

        nav a {
            color: #333;
            /* Dark text for links */
            text-decoration: none;
            font-weight: 500;
            /* Medium weight for links */
            transition: color 0.3s;
        }

        nav a:hover {
            color: #c8102e;
            /* Change color on hover */
        }

        .profile {
            position: relative;
        }

        .profile-button {
            color: #333;
            /* Dark color for profile */
            cursor: pointer;
            padding: 10px;
            margin-left: 20px;
        }

        .dropdown {
            display: none;
            position: absolute;
            background-color: #ffffff;
            /* Light background for dropdown */
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown a {
            color: black;
            /* Dark text for dropdown links */
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown a:hover {
            background-color: #f1f1f1;
            /* Light gray on hover */
        }

        .show {
            display: block;
        }

        .profile img {
            width: 30px;
            height: auto;
            cursor: pointer;
            margin-left: 20px;
            border-radius: 50%;
            /* Circular profile image */
        }

        h2 {
            text-align: center;
            color: #c8102e;
            /* Red Bull Red */
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        .welcome {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
        }

        a.logout {
            display: block;
            text-align: center;
            margin: 20px auto;
            padding: 10px 15px;
            background-color: #c8102e;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            width: 120px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background-color: #1e1e1e;
            /* Darker card background */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            transition: transform 0.3s;
            width: 300px;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .card-content {
            padding: 15px;
        }

        .card-title {
            font-size: 20px;
            color: #c8102e;
            margin-bottom: 10px;
        }

        .card-description {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .card-price {
            font-weight: bold;
            color: #ffcc00;
            /* Gold color for price */
        }

        /* About Section */
        #about-section {
            background-color: #c8102e;
            /* Red Bull Red */
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-top: 40px;
            text-align: center;
        }

        #about-section h3 {
            margin-bottom: 10px;
        }

        /* Contact Section */
        #contact-section {
            background-color: #1e1e1e;
            /* Dark background */
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            text-align: center;
        }

        #contact-section h3 {
            margin-bottom: 10px;
        }

        #contact-section a {
            color: #ffcc00;
            /* Gold color */
            text-decoration: none;
            transition: color 0.3s;
        }

        #contact-section a:hover {
            color: #fff;
            /* Change to white on hover */
        }

        @media (max-width: 600px) {
            .card {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav>
        <div class="logo">
            <img src="../img/logo.png" alt="Logo">
        </div>
        <h1>Red Bull Showroom</h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="profile">
                <span class="profile-button" onclick="toggleDropdown()"><img src="../img/profile.png" alt="profile"></span>
                <div class="dropdown" id="dropdownMenu">
                    <a href="profile.php">View Profile</a>
                    <a href="../session/logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <script>
        function toggleDropdown() {
            document.getElementById("dropdownMenu").classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.profile-button')) {
                var dropdown = document.getElementById("dropdownMenu");
                if (dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                }
            }
        }
    </script>


    <h2>Dashboard Showroom</h2>
    <p class="welcome">Selamat datang, <?= $_SESSION['username']; ?>!</p>
    <div class="card-container">
        <?php
        $query = "SELECT p.*, u.nama_lengkap FROM product p LEFT JOIN usersr u ON p.id_user = u.id_user";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query Error: " . mysqli_error($conn));
        }

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="card">
                <img src="../uploads/<?= $row['gambar']; ?>" alt="<?= $row['nama_product']; ?>">
                <div class="card-content">
                    <h3 class="card-title"><?= $row['nama_product']; ?></h3>
                    <p class="card-description"><?= $row['deskripsi']; ?></p>
                    <p class="card-price"><?= number_format($row['harga'], 0, ',', '.'); ?> IDR</p>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- About Section -->
    <section id="about-section">
        <h3>Tentang Kami</h3>
        <p>Kami adalah showroom mobil balap yang menyediakan berbagai jenis mobil berkualitas tinggi. Mengedepankan inovasi dan performa, kami siap memberikan pengalaman terbaik bagi pecinta otomotif.</p>
    </section>

    <!-- Contact Section -->
    <section id="contact-section">
        <h3>Kontak Kami</h3>
        <p>Untuk pertanyaan lebih lanjut, silakan hubungi kami melalui:</p>
        <p>Email: <a href="mailto:info@showroom.com">info@showroom.com</a></p>
        <p>Telepon: <a href="tel:+62123456789">+62 123 456 789</a></p>
    </section>
</body>

</html>