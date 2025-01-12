<?php
$servername = "localhost";
$Username = "root"; // Your database username
$Password = ""; // Your database password
$dbname = "crud"; // Your database name

$conn = mysqli_connect($servername, $Username, $Password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>