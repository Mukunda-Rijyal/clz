<?php
session_start();
require('_db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the attendance data from the POST request
    $attendance = $_POST['attendance'];
    $batch = $_SESSION['batch'];  // Get batch from session
    $department = $_SESSION['department']; 
    
    // Get department from session
    
    // Prepare the query to insert the attendance data
    $sql = "INSERT INTO attendence (Student_ID, Attendance_Status, Date) VALUES ";
    $values = array();

    // Loop through the attendance array and add each student's attendance
    foreach ($attendance as $student_id => $status) {
        $values[] = "('$student_id', '$status', NOW())";  // Using NOW() for current date
    }

    // Join the values and execute the query
    $sql .= implode(', ', $values);

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Attendance submitted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}
?>
