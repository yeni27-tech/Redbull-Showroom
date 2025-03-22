<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <style>
        nav {
            background-color: rgb(255, 255, 255);
            color: rgb(0, 0, 0);
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 50px;
        }

        .logo img {
            width: 200px;
            height: 200px;
        }

        nav h1 {
            margin: 0;
            font-size: 24px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav li {
            margin-right: 20px;
        }

        nav a {
            color: #DC0000;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav>
        <div class="logo">
            <img src="../img/logo.png" alt="Logo">
        </div>
        <h1>Red Bull Showroom</h1>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
</body>

</html>