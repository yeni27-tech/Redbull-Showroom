<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header("Location: ../publik/login.php");
    exit();
}

// // Jika admin, arahkan ke halaman admin secara otomatis
// if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
//     header("Location: ../admin/index.php");
//     exit();
// }
