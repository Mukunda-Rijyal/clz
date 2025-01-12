<?php
session_start();
require('_db.php');
// include('_selection-handle.php');

// Check if session is set
if ($_SESSION['set'] == true) {
    $batch = $_SESSION['batch'];
    $department = $_SESSION['department'];

    // Query to fetch students
    $sql = "SELECT * FROM students WHERE Batch_Year = '$batch' AND Department = '$department'";
    $result = mysqli_query($conn, $sql);
} else {
    header('Location: selection.php');
    exit(); // Ensure script stops after redirection
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Attendance</title>
    <link rel="stylesheet" href="styles/teacher-style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1>Teacher Attendance</h1>
        </div>
    </header>
    <div class="container main">
        <h2>Mark Attendance</h2>

        <form action="submit_attendance.php" method="post">
            <table>
                <tr>
                    <th>Student Name</th>
                    <th>Present</th>
                    <th>Absent</th>
                </tr>
                <?php
                // Initialize an index to create unique names for radio buttons
                while ($user = mysqli_fetch_assoc($result)) {
                    $name = $user['Student_Name'];  // Corrected this line
                    $student_id = $user['Student_ID']; // Assuming there is a Student_ID field for uniqueness
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($name); ?></td>
                    <td><input type="radio" name="attendance[<?php echo $student_id; ?>]" value="present"></td>
                    <td><input type="radio" name="attendance[<?php echo $student_id; ?>]" value="absent"></td>
                </tr>
                <?php
                }
                
                ?>
            </table>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>

</html>
