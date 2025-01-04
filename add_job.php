<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit;
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $job_type = $_POST['job_type'];
    $description = $_POST['description'];
    $salary = $_POST['salary'];
    $posted_on = date('Y-m-d');
    $application_deadline = $_POST['application_deadline'];

    $sql = "INSERT INTO jobs (title, company, location, job_type, description, salary, posted_on, application_deadline) 
            VALUES ('$title', '$company', '$location', '$job_type', '$description', '$salary', '$posted_on', '$application_deadline')";

    if ($conn->query($sql)) {
        $success = "Job added successfully!";
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Job</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .job-form-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }

        form input,
        form textarea,
        form select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        form textarea {
            height: 100px;
        }

        .btn-submit {
            background: #007e33;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        .btn-submit:hover {
            background: #005f26;
        }

        .error,
        .success {
            margin-bottom: 10px;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }

        .back-link {
            display: block;
            margin-top: 10px;
            text-align: center;
        }

        .back-link a {
            color: #007bff;
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="job-form-container">
        <h1>Add New Job</h1>
        <?php if (isset($error)) {
            echo "<p class='error'>$error</p>";
        } ?>
        <?php if (isset($success)) {
            echo "<p class='success'>$success</p>";
        } ?>
        <form action="" method="POST">
            <input type="text" name="title" placeholder="Job Title" required>
            <input type="text" name="company" placeholder="Company Name" required>
            <input type="text" name="location" placeholder="Location" required>
            <select name="job_type" required>
                <option value="">Select Job Type</option>
                <option value="Full-Time">Full-Time</option>
                <option value="Part-Time">Part-Time</option>
                <option value="Internship">Internship</option>
                <option value="Contract">Contract</option>
            </select>
            <textarea name="description" placeholder="Job Description" required></textarea>
            <input type="number" name="salary" placeholder="Salary (e.g., 50000)" required>
            <label for="application_deadline">Application Deadline:</label>
            <input type="date" name="application_deadline" required>
            <button class="btn-submit" type="submit">Add Job</button>
        </form>
        <div class="back-link">
            <a href="manage_jobs.php">Back to Job Management</a>
        </div>
    </div>
</body>

</html>