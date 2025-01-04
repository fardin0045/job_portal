<?php
include 'db.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE email='$email'";
    $result = $conn->query($sql);
    $admin = $result->fetch_assoc();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_name'] = $admin['username'];
        header('Location: admin_dashboard.php');
        exit;
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        /* General Body Styling */
        body {
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #6c63ff, #7f7fd5);
        }

        /* Login Container Styling */
        .login-container {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 400px;
            animation: fadeIn 0.8s ease-in-out;
        }

       

        h1 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
            background: #f9f9f9;
            transition: border-color 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #6c63ff;
        }

        .btn-login {
            background: #6c63ff;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-login:hover {
            background: #5a55d1;
            transform: translateY(-2px);
        }

        .error {
            color: #d9534f;
            font-size: 14px;
            margin-bottom: 10px;
        }

        p {
            margin-top: 15px;
            font-size: 14px;
        }

        p a {
            color: #6c63ff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        p a:hover {
            color: #5a55d1;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <?php if (isset($error)) {
            echo "<p class='error'>$error</p>";
        } ?>
        <form action="" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button class="btn-login" type="submit">Login</button>
            <p>If you are new <a href="admin_register.php">Register here</a></p>
            <p>OR</p>
            <p>Go To  <a href="index.php">Home</a></p>
        </form>
    </div>
</body>

</html>
