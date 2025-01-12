<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Register</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <?php
    session_start();
    include 'db.php';

    // Initialize an empty message variable
    $message = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $cpassword = trim($_POST['cpassword']);

        // Check if username or password is empty
        if (empty($username) || empty($password)) {
            $message = "<div class='alert alert-danger mt-3'>Username and password cannot be empty.</div>";
        } else {
            // Check for duplicate username
            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $message = "<div class='alert alert-danger mt-3'>Username already exists. Please choose another one.</div>";
            } 
            elseif($cpassword !== $password) {
                $message = "<div class='alert alert-danger mt-3'>Password do not match.Please enter the same password in both fields.</div>";
            }
            else {
                // Insert new user
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (username, password) VALUES ('$username', '$passwordHash')";
                if (mysqli_query($conn, $sql)) {
                    $message = "<div class='alert alert-success mt-3'>Registration successful!</div>";
                } else {
                    $message = "<div class='alert alert-danger mt-3'>Error: " . mysqli_error($conn) . "</div>";
                }
            }
        }
    }

    // Display the message
    if (!empty($message)) {
        echo $message;
    }
    ?>
    <div class="container">
        <h2 class="mt-5">Register</h2>
        <form method="POST" class="mt-3">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label for="cpassword">Conform Password</label>
                <input type="password" class="form-control" name="cpassword" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>


    </div>
</body>

</html>