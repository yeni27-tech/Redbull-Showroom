<?php
session_start();
include './connection/conn.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM usersr WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($user) {
    $_SESSION['id_user'] = $user['id_user'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    if ($user['role'] == 'admin') {
        header("Location: ../admin/index.php");
    } elseif ($user['role'] == 'user') {
        header("Location: ../index.php");
    }
} else {
    echo "Username atau password salah.";
}