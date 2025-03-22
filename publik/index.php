<?php
include '../session/session.php';
include '../connection/conn.php';
include '../partials/navbar.php';

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
            padding: 20px;
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
        .about-section {
            background-color: #c8102e;
            /* Red Bull Red */
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-top: 40px;
            text-align: center;
        }

        .about-section h3 {
            margin-bottom: 10px;
        }

        /* Contact Section */
        .contact-section {
            background-color: #1e1e1e;
            /* Dark background */
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            text-align: center;
        }

        .contact-section h3 {
            margin-bottom: 10px;
        }

        .contact-section a {
            color: #ffcc00;
            /* Gold color */
            text-decoration: none;
            transition: color 0.3s;
        }

        .contact-section a:hover {
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
    <div class="about-section">
        <h3>Tentang Kami</h3>
        <p>Kami adalah showroom mobil balap yang menyediakan berbagai jenis mobil berkualitas tinggi. Mengedepankan inovasi dan performa, kami siap memberikan pengalaman terbaik bagi pecinta otomotif.</p>
    </div>

    <!-- Contact Section -->
    <div class="contact-section">
        <h3>Kontak Kami</h3>
        <p>Untuk pertanyaan lebih lanjut, silakan hubungi kami melalui:</p>
        <p>Email: <a href="mailto:info@showroom.com">info@showroom.com</a></p>
        <p>Telepon: <a href="tel:+62123456789">+62 123 456 789</a></p>
    </div>
</body>

</html>