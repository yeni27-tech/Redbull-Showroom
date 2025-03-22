<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            /* Using the Roboto font */
        }

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
    </style>
</head>

<body>
    <nav>
        <div class="logo">
            <img src="../img/logo.png" alt="Logo">
        </div>
        <h1>Red Bull Showroom</h1>
        <ul>
            <li><a href="../publik/index.php">Home</a></li>
            <li><a href="../publik/index.php/#about">About</a></li>
            <li><a href="../publik/index.php/#contact">Contact</a></li>
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
</body>

</html>