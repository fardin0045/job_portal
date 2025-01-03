<?php
// Include database connection
include 'db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $cover_letter = mysqli_real_escape_string($conn, $_POST['cover_letter']);

    // Insert form data into database
    $sql = "INSERT INTO applications (name, email, phone, cover_letter) 
            VALUES ('$name', '$email', '$phone', '$cover_letter')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Application submitted successfully.'); window.location.href = 'thank_you.php';</script>";
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
    <title>Apply Online</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .apply-form {
            width: 100%;
            max-width: 650px;
            margin: 50px auto;
            background-color: #fff;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        label {
            font-size: 1rem;
            margin-bottom: 8px;
            color: #555;
            display: block;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 2px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        input:focus,
        textarea:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .btn-submit {
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

<body>
    <?php include "navbar.php"; ?>

    <div class="apply-form">
        <h1>Apply Online</h1>
        <form action="applyonline.php" method="POST" enctype="multipart/form-data">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" required>

            <label for="cover_letter">Cover Letter</label>
            <textarea id="cover_letter" name="cover_letter" rows="4" required></textarea>

            <label for="resume">Upload Resume</label>
            <input type="file" id="resume" name="resume">

            <button class="btn-submit" type="submit">Submit Application</button>
        </form>
    </div>

    <?php include "footer.php"; ?>
</body>

</html>