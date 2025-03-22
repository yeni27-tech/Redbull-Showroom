<?php
include '../connection/conn.php';
include '../session/session.php';
include '../partials/navbar.php';

$query = "SELECT p.*, u.nama_lengkap FROM product p LEFT JOIN usersr u ON p.id_user = u.id_user";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar Produk</title>
</head>

<body>
    <h2>Daftar Produk</h2>
    <a href="tambah_produk.php">Tambah Produk</a>
    <table border="1">
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
                <td><?= $row['harga'] ?></td>
                <td><img src="uploads/<?= $row['gambar'] ?>" width="100"></td>
                <td><?= $row['status'] ?></td>
                <td><?= $row['nama_lengkap'] ?></td>
                <td>
                    <a href="edit_produk.php?id=<?= $row['id_product'] ?>">Edit</a>
                    <a href="hapus_produk.php?id=<?= $row['id_product'] ?>" onclick="return confirm('Hapus produk ini?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>