<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamar Job Portal</title>
    <style>
        /* General Navbar Styling */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(135deg, #007e33, #00c851);
            padding: 10px 20px;
            color: white;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar ul li {
            margin: 0 10px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            transition: color 0.3s;
        }

        .navbar ul li a:hover {
            color: #ddd;
            /* Lighter shade when hovering */
        }

        .navbar .btn {
            background-color: white;
            color: #4CAF50;
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s, color 0.3s;
        }

        .navbar .btn:hover {
            background: linear-gradient(135deg, rgba(0, 100, 81, 0.8), rgba(0, 21, 51, 0.8));
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="logo">Kamar</div>

        <!-- Links -->
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="job_news.php">Job News</a></li>

            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- Show username and logout button if logged in -->
                <li><a href="profile.php">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <!-- Show login and register if not logged in -->
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php endif; ?>
        </ul>

        <!-- Optional Button (e.g., Post a Job) -->
        <button class="btn" onclick="window.location.href='admin_login.php';">Post a Job</button>
    </nav>
</body>

</html>