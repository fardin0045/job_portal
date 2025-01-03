<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .thank-you {
            width: 100%;
            max-width: 600px;
            margin: 100px auto;
            padding: 30px;
            background-color: #ffffff;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2rem;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 30px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        button:active {
            background-color: #3e8e41;
        }

      
    </style>
</head>

<body>
    <?php include "navbar.php"; ?>
    <div class="thank-you">
        <h1>Thank You for Your Application!</h1>
        <p>Your application has been successfully submitted. We will review it and get back to you shortly.</p>
        <a href="index.php"><button>Go Back To Home Page</button></a>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>
