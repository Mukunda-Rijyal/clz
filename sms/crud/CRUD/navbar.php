<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="welcome_note.php">Note App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="welcome_note.php">Home</a>
            </li>
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                // User is logged in, show logout option
                echo '<li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                      </li>';
            } else {
                // User is not logged in, show login and register options
                echo '<li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                      </li>';
            }
            ?>
        </ul>
    </div>
</nav>