<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $job = $conn->query("SELECT * FROM jobs WHERE id = $id")->fetch_assoc();

    if (!$job) {
        echo "<script>alert('Job not found.'); window.location.href='manage_jobs.php';</script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $job_type = $_POST['job_type'];
    $description = $_POST['description'];
    $salary = $_POST['salary'];
    $application_deadline = $_POST['application_deadline'];

    $sql = "UPDATE jobs SET 
                title = '$title',
                company = '$company',
                location = '$location',
                job_type = '$job_type',
                description = '$description',
                salary = '$salary',
                application_deadline = '$application_deadline'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Job updated successfully!'); window.location.href='manage_jobs.php';</script>";
    } else {
        echo "<script>alert('Error updating job.'); window.location.href='manage_jobs.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job</title>
    <style>
        /* General Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        h1 {
            font-size: 24px;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background: #f9f9f9;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        button {
            background-color: #007e33;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            text-transform: uppercase;
        }

        button:hover {
            background-color: #005f26;
        }

        .back-link {
            text-align: center;
            margin-top: 15px;
        }

        .back-link a {
            color: #007e33;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Edit Job</h1>
        <form action="" method="POST">
            <label for="title">Job Title</label>
            <input type="text" id="title" name="title" value="<?php echo $job['title']; ?>" required>

            <label for="company">Company</label>
            <input type="text" id="company" name="company" value="<?php echo $job['company']; ?>" required>

            <label for="location">Location</label>
            <input type="text" id="location" name="location" value="<?php echo $job['location']; ?>" required>

            <label for="job_type">Job Type</label>
            <select id="job_type" name="job_type" required>
                <option value="Full-Time" <?php if ($job['job_type'] == 'Full-Time') echo 'selected'; ?>>Full-Time</option>
                <option value="Part-Time" <?php if ($job['job_type'] == 'Part-Time') echo 'selected'; ?>>Part-Time</option>
                <option value="Remote" <?php if ($job['job_type'] == 'Remote') echo 'selected'; ?>>Remote</option>
            </select>

            <label for="description">Description</label>
            <textarea id="description" name="description" required><?php echo $job['description']; ?></textarea>

            <label for="salary">Salary</label>
            <input type="number" id="salary" name="salary" value="<?php echo $job['salary']; ?>" required>

            <label for="application_deadline">Application Deadline</label>
            <input type="date" id="application_deadline" name="application_deadline" value="<?php echo $job['application_deadline']; ?>" required>

            <button type="submit">Update Job</button>
        </form>
        <div class="back-link">
            <a href="manage_jobs.php">← Back to Manage Jobs</a>
        </div>
    </div>
</body>

</html>
