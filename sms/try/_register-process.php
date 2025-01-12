<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {

    require '_db.php';

    $image_tmp = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name']; 
    $target_dir = "image/" . $image_name;

    $name = $_POST['name'];
    $student_id = $_POST['student_id'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $batch_year = $_POST['batch_year'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $depart_id = $_POST['depart_id'];
    $gender = $_POST['gender'];

    // Check if Student ID, Email, or Contact already exists
    $sql = "SELECT * FROM students WHERE Student_ID = '$student_id' OR Email = '$email' OR Contact = '$contact'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if ($user['Student_ID'] == $student_id) {
            header('Location: register.php?error=student_id_exists');
            exit(); // Stop further execution
        } elseif ($user['Email'] == $email) {
            header('Location: register.php?error=email_exists');
            exit(); // Stop further execution
        } elseif ($user['Contact'] == $contact) {
            header('Location: register.php?error=contact_exists');
            exit(); // Stop further execution
        }
    }

    // If validation passes, upload the file and insert data
    if (move_uploaded_file($image_tmp, $target_dir)) {
        $sql = "INSERT INTO students (Student_ID, Student_Name, Password, Address, Batch_Year, Contact, Email, Department, Department_IT, Gender, Profile_img) 
                VALUES ('$student_id', '$name', '$password', '$address', '$batch_year', '$contact', '$email', '$department', '$depart_id', '$gender', '$image_name')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('Location: register.php?success=registration_complete');
            exit();
        } else {
            header('Location: register.php?error=data_insertion_failed');
            exit();
        }
    } else {
        header('Location: register.php?error=file_upload_failed');
        exit();
    }
}
?>
