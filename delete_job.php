<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Validate the ID
    if ($id > 0) {
        $sql = "DELETE FROM jobs WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Job deleted successfully!'); window.location.href='manage_jobs.php';</script>";
        } else {
            echo "<script>alert('Error deleting job.'); window.location.href='manage_jobs.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid job ID.'); window.location.href='manage_jobs.php';</script>";
    }
} else {
    header('Location: manage_jobs.php');
}
?>
