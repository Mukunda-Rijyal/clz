<?php
session_start(); // Start the session at the top of the file
require('_db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input to prevent SQL injection
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to find the student by ID and password
    $sql = "SELECT * FROM students WHERE Student_ID = '$student_id' AND Password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);

        // Set session variables after successful login
        $_SESSION['student_id'] = $student['Student_ID'];
        $_SESSION['name'] = $student['Student_Name'];
        $_SESSION['department'] = $student['Department'];
        $_SESSION['batch'] = $student['Batch_Year'];

        // Debugging: Check session variables
        var_dump($_SESSION);

        // Redirect to student dashboard
        header('Location: student.php');
        exit(); // Ensure no further code is executed
    } else {
        echo "Invalid student ID or password!";
    }
} else {
    echo "Invalid request!";
}
?>
