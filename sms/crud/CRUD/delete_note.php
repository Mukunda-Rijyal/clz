<?php
session_start();
include 'db.php';

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("location: login.php");
    exit;
}

if (isset($_GET['sno'])) {
    $sno = $_GET['sno'];
    $userId = $_SESSION['user_id'];

    $sql = "DELETE FROM notes WHERE sno='$sno' AND user_id='$userId'";
    if (mysqli_query($conn, $sql)) {
        header("location: welcome_note.php");
    } else {
        echo "<div class='alert alert-danger'>Error deleting note: " . mysqli_error($conn) . "</div>";
    }
}
?>


<!-- <a href='delete_note.php?sno={$note[' sno']}' class='btn btn-danger'>Delete</a> -->