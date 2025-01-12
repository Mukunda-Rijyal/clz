<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Welcome</title>
</head>

<body>
    <?php
session_start();
include 'db.php';
include 'navbar.php';

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];
$sql = "SELECT username FROM users WHERE id='$userId'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
$userName = $user['username'];

// Handle note submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_note'])) {
    $noteTitle = trim($_POST['note_title']);
    $noteDescription = trim($_POST['note_description']);
    $userId = $_SESSION['user_id'];

    if (!empty($noteTitle) && !empty($noteDescription)) {
        $sql = "INSERT INTO notes (title, description, user_id) VALUES ('$noteTitle', '$noteDescription', '$userId')";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success mt-3'>Note added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Error adding note: " . mysqli_error($conn) . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger mt-3'>Both title and description cannot be empty.</div>";
    }
}

// Handle note editing
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_note'])) {
    $noteId = $_POST['note_id'];
    $noteTitle = trim($_POST['note_title']);
    $noteDescription = trim($_POST['note_description']);

    if (!empty($noteTitle) && !empty($noteDescription)) {
        $sql = "UPDATE notes SET title='$noteTitle', description='$noteDescription' WHERE sno='$noteId'";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success mt-3'>Note updated successfully!</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Error updating note: " . mysqli_error($conn) . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger mt-3'>Both title and description cannot be empty.</div>";
    }
}
?>

    <div class="container">
        <h1 class="mt-3">Welcome, <?php echo htmlspecialchars($userName); ?>!</h1>


        <h2 class="mt-5">Your Notes</h2>

        <!-- Form to add a new note -->
        <form method="POST" class="mb-4">
            <div class="form-group">
                <label for="note_title">Title</label>
                <input type="text" class="form-control" name="note_title" required>
            </div>
            <div class="form-group">
                <label for="note_description">Description</label>
                <textarea class="form-control" name="note_description" rows="3" required></textarea>
            </div>
            <button type="submit" name="add_note" class="btn btn-primary">Add Note</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $userId = $_SESSION['user_id'];
            $sql = "SELECT * FROM notes WHERE user_id='$userId'";
            $result = mysqli_query($conn, $sql);

            while ($note = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$note['title']}</td>
                        <td>{$note['description']}</td>
                        <td>
                            <button class='btn btn-primary' data-toggle='modal' data-target='#editModal{$note['sno']}'>Edit</button>
                            <button class='btn btn-danger' data-toggle='modal' data-target='#deleteModal{$note['sno']}'>Delete</button>
                        </td>
                      </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

    <!-- Edit Note Modal -->
    <?php
$result = mysqli_query($conn, "SELECT * FROM notes WHERE user_id='$userId'");
while ($note = mysqli_fetch_assoc($result)) {
    echo "
    <div class='modal fade' id='editModal{$note['sno']}' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='editModalLabel'>Edit Note</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    <form method='POST'>
                        <input type='hidden' name='note_id' value='{$note['sno']}'>
                        <div class='form-group'>
                            <label for='note_title'>Title</label>
                            <input type='text' class='form-control' name='note_title' value='{$note['title']}' required>
                        </div>
                        <div class='form-group'>
                            <label for='note_description'>Description</label>
                            <textarea class='form-control' name='note_description' rows='3' required>{$note['description']}</textarea>
                        </div>
                        <button type='submit' name='edit_note' class='btn btn-primary'>Update Note</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class='modal fade' id='deleteModal{$note['sno']}' tabindex='-1' role='dialog' aria-labelledby='deleteModalLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='deleteModalLabel'>Confirm Delete</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    Are you sure you want to delete this note?
                </div>
                <div class='modal-footer'>
                    <a href='delete_note.php?sno={$note['sno']}' class='btn btn-danger'>Delete</a>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                </div>
            </div>
        </div>
    </div>
    ";
}
?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>