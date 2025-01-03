<?php
include 'db.php';

// Fetch all job data from the database
$sql = "SELECT * FROM jobs ORDER BY posted_on DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job News</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .news-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .news-title {
            text-align: center;
            font-size: 2em;
            color:tomato;
            margin-bottom: 20px;
        }

        .job-news {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }

        .job-news-card {
            flex: 1 1 calc(33.333% - 20px);
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .job-news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .job-news-header {
            background: linear-gradient(135deg, #00c851, #007e33);
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        .job-news-header h2 {
            margin: 0;
            font-size: 1.5em;
        }

        .job-news-details {
            padding: 15px;
        }

        .job-news-details p {
            margin: 10px 0;
            font-size: 0.9em;
            color: #555;
        }

        .view-details-btn {
            display: block;
            background: #007e33;
            color: #fff;
            text-align: center;
            padding: 10px 15px;
            margin: 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.9em;
          
        }

        .view-details-btn:hover {
            background: #005a23;
        }
    </style>
</head>

<body>
    <header>
        <?php include "navbar.php"; ?>
    </header>

    <div class="news-container">
        <h1 class="news-title">Latest Job News</h1>
        <div class="job-news">
            <?php while ($job = $result->fetch_assoc()) { ?>
                <div class="job-news-card">
                    <div class="job-news-header">
                        <h2><?php echo $job['title']; ?></h2>
                    </div>
                    <div class="job-news-details">
                        <p><strong>Company:</strong> <?php echo $job['company']; ?></p>
                        <p><strong>Location:</strong> <?php echo $job['location']; ?></p>
                        <p><strong>Type:</strong> <?php echo $job['job_type']; ?></p>
                        <p><strong>Salary:</strong> <?php echo $job['salary']; ?></p>
                        <p><strong>Posted On:</strong> <?php echo date("F j, Y", strtotime($job['posted_on'])); ?></p>
                        <p><strong>Deadline:</strong> <?php echo date("F j, Y", strtotime($job['application_deadline'])); ?>
                        </p>
                        <a href="job_details.php?id=<?php echo $job['id']; ?>" class="view-details-btn">View Details</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include "footer.php" ;?>
</body>

</html>