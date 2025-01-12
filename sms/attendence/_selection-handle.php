<?php
session_start();
require('_db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $batch = $_POST['batch'];
    $department = $_POST['department'];

    // Query to fetch students from the selected batch and department
    $sql = "SELECT * FROM students WHERE Batch_Year = '$batch' AND Department = '$department'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $_SESSION['set'] = true;
        $_SESSION['batch'] = $batch;
        $_SESSION['department'] = $department;
        header('Location: teacher.php');
    } else {
        echo "No students found for the selected criteria.";
    }
} else {
    die('Invalid request.');
}
