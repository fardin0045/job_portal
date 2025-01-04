<?php
include 'db.php';

// Pagination setup: Set a default value if `limit` is not provided in the URL
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 6;

// Fetch jobs with the current limit
$sql = "SELECT * FROM jobs ORDER BY posted_on DESC LIMIT $limit";
$result = $conn->query($sql);
// Get total jobs count
$count_sql = "SELECT COUNT(*) AS total_jobs FROM jobs";
$count_result = $conn->query($count_sql);
$total_jobs = $count_result->fetch_assoc()['total_jobs'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .banner {
            position: relative;
            background: linear-gradient(135deg, rgba(0, 100, 81, 0.8), rgba(0, 21, 51, 0.8)), url('office-work-1024x684.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
            padding: 100px 20px;
            text-align: center;
        }

        .banner-content {
            max-width: 800px;
            margin: auto;
            z-index: 2;
            position: relative;
        }

        .banner-content h1 {
            font-size: 3em;
            margin: 0 0 10px;
            font-weight: 700;
        }

        .banner-content p {
            font-size: 1.5em;
            margin: 0 0 20px;
            line-height: 1.5;
        }

        .btn-banner {
            background: #00c851;
            color: #fff;
            text-decoration: none;
            padding: 15px 30px;
            font-size: 1.2em;
            border-radius: 5px;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-banner:hover {
            background: #007e33;
        }

        .banner-image {
            display: none;

            width: 100%;
            height: auto;
        }

        .job_container {
            max-width: 1200px;
            margin: auto;
        }

        .job-listings {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
        }

        .job-card {

            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            transition: 0.3s, 0.3s;
        }

        .job-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .job-header {
            background: linear-gradient(135deg, #4a90e2, #6ec1e4);
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .job-header h2 {
            margin: 0;
            font-size: 1.5em;
            font-weight: 600;
        }

        .job-header .company {
            font-size: 1em;
            font-weight: 400;
            margin-top: 5px;
            opacity: 0.8;
        }

        .job-details {
            padding: 20px;
            font-size: 0.9em;
            color: #555;
            line-height: 1.6;
        }

        .job-details p {
            margin: 5px 0;
        }

        .btn {
            display: block;
            text-align: center;
            background: linear-gradient(135deg, #00c851, #007e33);
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 0 0 8px 8px;

        }

        .btn:hover {
            background: linear-gradient(135deg, #007e33, #00c851);
        }

        .show-more-container {
            text-align: center;
            margin-top: 20px;
        }

        .show-more-btn {
            background: linear-gradient(135deg, #007e33, #00c851);
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: 0.3s;
        }

        .show-more-btn:hover {
            background: linear-gradient(135deg, #00c851, #007e33);

        }
    </style>
</head>
<header>
    <?php include "navbar.php"; ?>
</header>
<div class="banner">
    <div class="banner-content">
        <h1>Find Your Dream Job</h1>
        <p>Explore thousands of job opportunities across Bangladesh and take the next step in your career.</p>
        <a href="job_news.php" class="btn-banner">See Jobs</a>
    </div>
    <img src="office-work-1024x684.jpg" alt="Office Work" class="banner-image">
</div>

<main class="job_container">
    <h1 style="text-align:center">Featured Jobs</h1>
    <div class="job-listings">

        <?php while ($job = $result->fetch_assoc()) { ?>
            <div class="job-card">
                <h2><?php echo $job['title']; ?></h2>
                <p><strong>Company:</strong> <?php echo $job['company']; ?></p>
                <p><strong>Location:</strong> <?php echo $job['location']; ?></p>
                <p><strong>Type:</strong> <?php echo $job['job_type']; ?></p>
                <p><strong>Salary:</strong> <?php echo $job['salary']; ?></p>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="job_details.php?id=<?php echo $job['id']; ?>" class="btn">Apply Online</a>
                <?php else: ?>
                    <a href="login.php" class="btn" style="background:linear-gradient(135deg, #00c851, #007e33);">Login to Apply</a>
                <?php endif; ?>

            </div>
        <?php } ?>
    </div>
    <?php if ($limit < $total_jobs) { ?>
        <div class="show-more-container">
            <form action="" method="get">
                <input type="hidden" name="limit" value="<?php echo $limit + 6; ?>">
                <button type="submit" class="show-more-btn">Show More</button>
            </form>
        </div>
    <?php } ?>
</main>
<?php include "footer.php"; ?>
</body>

</html>