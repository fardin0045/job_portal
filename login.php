<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header('Location: index.php');
    } else {
        echo "Invalid credentials!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .login{
            margin-top: 20px;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        form {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 50px;
            width: 80%;
            max-width: 450px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;


        }


        label {

            display: block;
            font-size: 1rem;
            margin-bottom: 8px;
            color: #555;
            text-align: start;
        }

        input {
            width: 94%;
            padding: 12px;
            margin-bottom: 10px;
            border: 2px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;

        }

        .btn-login {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;

        }
    </style>
    </style>
</head>

<body>
    <?php include "navbar.php"; ?>
    <div class="login">
        <form action="" method="POST">
            <h1>Login</h1>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button class="btn-login" type="submit">Login</button>
        </form>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>