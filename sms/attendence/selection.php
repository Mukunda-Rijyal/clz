

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selection Page</title>
</head>
<link rel="stylesheet" href="styles/selection.css">
<body>
    <form action="_selection-handle.php" method="post">
        <label for="batch">Batch:</label>
        <input type="number" id="batch" name="batch" required><br><br>
        
        <label for="department">Department:</label>
        <select id="department" name="department" required>
            <option value="IT">IT</option>
            <option value="MECHA">MECHA</option>
            <option value="AUTO">AUTO</option>
            <option value="ELE">ELE</option>
            <option value="REF">REF</option>
        </select><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>