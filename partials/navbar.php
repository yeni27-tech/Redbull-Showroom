<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        nav {
            background-color: rgb(255, 255, 255);
            color: rgb(0, 0, 0);
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 50px;
            border: rgb(165, 1, 1) 2px solid;
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
            color: #DC0000;
            text-decoration: none;
        }

        .profile {
            position: relative;
        }

        .profile-button {
            color: #DC0000;
            cursor: pointer;
            padding: 10px;
            margin-left: 20px;
        }

        .dropdown {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown a:hover {
            background-color: #f1f1f1;
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

        //tutp
        window.onclick = function(event) {
            if (!event.target.matches('.profile-button')) {
                var dropdown = document.getElementById("dropdownMenu");
                if (dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                }
            }
        }
    </script>
</body>

</html>