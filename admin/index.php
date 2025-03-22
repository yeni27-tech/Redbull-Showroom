<?php
include '../connection/conn.php';
include '../session/session.php';
include '../partials/navbar.php';

// Cek apakah user sudah login dan apakah role-nya admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "Akses ditolak. Halaman ini hanya untuk admin.";
    exit;
}

$query = "SELECT p.*, u.nama_lengkap FROM product p LEFT JOIN usersr u ON p.id_user = u.id_user";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #c8102e;
        }

        .welcome {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            color: #c8102e;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
            background-color: white;
        }

        th {
            background-color: #c8102e;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            width: 100px;
            height: auto;
            border-radius: 5px;
        }

        .button-container {
            text-align: center;
            margin: 20px 0;
        }

        .button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #c8102e;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #a50f2e;
        }

        /* Styling for cards */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 300px;
            transition: transform 0.2s;
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
            color: #333;
        }

        @media (max-width: 600px) {

            table,
            th,
            td {
                display: block;
                width: 100%;
            }

            th {
                display: none;
            }

            td {
                text-align: right;
                position: relative;
                padding-left: 50%;
                border: none;
            }

            td:before {
                position: absolute;
                left: 10px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: left;
            }

            td:nth-of-type(1):before {
                content: "ID";
            }

            td:nth-of-type(2):before {
                content: "Nama Produk";
            }

            td:nth-of-type(3):before {
                content: "Deskripsi";
            }

            td:nth-of-type(4):before {
                content: "Harga";
            }

            td:nth-of-type(5):before {
                content: "Gambar";
            }

            td:nth-of-type(6):before {
                content: "Status";
            }

            td:nth-of-type(7):before {
                content: "Uploader";
            }

            td:nth-of-type(8):before {
                content: "Aksi";
            }
        }
    </style>
</head>

<body>
    <p class="welcome">Selamat datang, Admin cantik <?= $_SESSION['username']; ?>!</p>
    <h2>Daftar Produk</h2>

    <div class="button-container">
        <a href="tambah_produk.php" class="button">Tambah Produk</a>
    </div>

    <div class="card-container">
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Status</th>
                <th>Uploader</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $row['id_product'] ?></td>
                    <td><?= $row['nama_product'] ?></td>
                    <td><?= $row['deskripsi'] ?></td>
                    <td><?= number_format($row['harga'], 0, ',', '.'); ?> IDR</td>
                    <td><img src="../uploads/<?= $row['gambar'] ?>" alt="<?= $row['nama_product']; ?>"></td>
                    <td><?= $row['status'] ?></td>
                    <td><?= $row['nama_lengkap'] ?></td>
                    <td>
                        <a href="edit_produk.php?id=<?= $row['id_product'] ?>">Edit</a>
                        <a href="hapus_produk.php?id=<?= $row['id_product'] ?>" onclick="return confirm('Hapus produk ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>

</html>