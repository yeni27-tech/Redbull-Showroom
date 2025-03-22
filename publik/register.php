<?php
session_start();
include '../connection/conn.php';
include '../partials/navbar.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = "user";

    $sql = "INSERT INTO usersr (username, password, email, role, nama_lengkap, no_hp) VALUES ('$username', '$password', '$email', '$role', '$nama_lengkap', '$no_hp')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Pendaftaran berhasil!'); window.location.href='./login.php';</script>";
    } else {
        echo "Pendaftaran gagal: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #DC0000;
        }

        form {
            margin-top: 50px;
            background: #fff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            color: #000;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 97%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            border: 1px solidrgb(0, 10, 193);
        }

        input[type="submit"] {
            background-color: #F4C300;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: rgb(234, 152, 45);
            animation: pulse 1s infinite;
            transition: ease-in 0.35s all;
        }

        @media screen and (max-width: 600px) {
            form {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <form method="POST">
        <label for="nama_lengkap">Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="no_hp">No HP:</label>
        <input type="text" name="no_hp" id="no_hp" required>
        <br>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" value="Daftar">
    </form>
</body>

</html>