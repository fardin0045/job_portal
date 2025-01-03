<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        header('Location: login.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .register {
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
            max-width:450px;
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

        .btn-register {
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
</head>
<?php include "navbar.php"; ?>

<body>

    <div class="register">
        <form action="" method="POST">
            <h1>Register</h1>
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button class="btn-register" type="submit">Register</button>
        </form>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>