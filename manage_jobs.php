<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit;
}

include 'db.php';

// Fetch jobs
$jobs = [];
$sql = "SELECT * FROM jobs ORDER BY posted_on DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $jobs[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Jobs</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        .container {
            width: 90%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #007e33;
            color: white;
        }

        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            color: white;
            margin-right: 10px;
        }

        .btn-edit {
            background-color: #007bff;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-add {
            background-color: #28a745;
            margin-bottom: 20px;
        }

        .btn-add:hover,
        .btn-edit:hover,
        .btn-delete:hover {
            opacity: 0.8;
        }

        .actions {
            text-align: center;
        }

        a {
            color: inherit;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Manage Jobs</h1>
        <a href="add_job.php" class="btn btn-add">Add New Job</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Location</th>
                    <th>Type</th>
                    <th>Posted On</th>
                    <th>Deadline</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jobs as $job): ?>
                    <tr>
                        <td><?= $job['id']; ?></td>
                        <td><?= htmlspecialchars($job['title']); ?></td>
                        <td><?= htmlspecialchars($job['company']); ?></td>
                        <td><?= htmlspecialchars($job['location']); ?></td>
                        <td><?= htmlspecialchars($job['job_type']); ?></td>
                        <td><?= htmlspecialchars($job['posted_on']); ?></td>
                        <td><?= htmlspecialchars($job['application_deadline']); ?></td>
                        <td class="actions">
                            <a href="edit_job.php?id=<?= $job['id']; ?>" class="btn btn-edit">Edit</a>
                            <a href="delete_job.php?id=<?= $job['id']; ?>" class="btn btn-delete"
                                onclick="return confirm('Are you sure you want to delete this job?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($jobs)): ?>
                    <tr>
                        <td colspan="8" style="text-align: center;">No jobs found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>