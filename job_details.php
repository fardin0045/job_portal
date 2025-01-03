<?php
include 'db.php';

$job_id = $_GET['id'];
$sql = "SELECT * FROM jobs WHERE id=$job_id";
$result = $conn->query($sql);
$job = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details</title>
    <link rel="stylesheet" href="styles.css">
    <style>
       

        /* Body Styling */
      
        h1 {
            font-size: 2.5rem;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .job-details {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: 20px auto;
            line-height: 1.8;
            text-align: center;

        }

        .job-details p {
            font-size: 1rem;
            margin-bottom: 15px;
            text-align: center;
        }

        .job-details p strong {
            color: #4CAF50;
            font-weight: 600;
            
        }

        /* Apply Button */
        .btn {
            display: inline-block;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            font-size: 1rem;
            border-radius: 4px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn:hover {
            background-color: #45a049;
        }

        .btn:active {
            background-color: #3e8e41;
        }
    </style>
</head>

<body>
    <?php include "navbar.php"; ?>
    <div class="job-details">
        <h1><?php echo $job['title']; ?></h1>
        <p><strong>Company:</strong> <?php echo $job['company']; ?></p>
        <p><strong>Location:</strong> <?php echo $job['location']; ?></p>
        <p><strong>Type:</strong> <?php echo $job['job_type']; ?></p>
        <p><strong>Description:</strong> <?php echo $job['description']; ?></p>
        <p><strong>Salary:</strong> <?php echo $job['salary']; ?></p>
        <p><strong>Deadline:</strong> <?php echo $job['application_deadline']; ?></p>
        <a href="applyonline.php?id=<?php echo $job['id']; ?>" class="btn">Apply Now</a>
       
    </div>
    <?php include "footer.php"; ?>
</body>

</html>