<?php
session_start(); // Start the session at the top of the file
require('_db.php');

// Ensure session variables are set
if (!isset($_SESSION['student_id'], $_SESSION['batch'])) {
    die("Unauthorized access or session expired.");
}

// Sanitize session variables for output
$student_id = mysqli_real_escape_string($conn, $_SESSION['student_id']);
$batch = mysqli_real_escape_string($conn, $_SESSION['batch']);
$name = htmlspecialchars($_SESSION['name']);
$department = htmlspecialchars($_SESSION['department']);

// Query to retrieve attendance records
$sql = "
    SELECT students.Student_ID, students.Student_Name, attendence.Attendance_Status, attendence.Date 
    FROM students
    INNER JOIN attendence ON students.Student_ID = attendence.Student_ID 
    WHERE students.Student_ID = '$student_id' AND students.Batch_Year = '$batch'
";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1>Student Attendance Status</h1>
    <p>Welcome, <?= $name ?> (<?= htmlspecialchars($name) ?>)</p>
    <table>
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Attendance Status</th>
            <th>Date</th>
        </tr>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['Student_ID']) ?></td>
                    <td><?= htmlspecialchars($row['Student_Name']) ?></td>
                    <td><?= htmlspecialchars($row['Attendance_Status']) ?></td>
                    <td><?= htmlspecialchars($row['Date']) ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" style="text-align:center;">No attendance records found.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
