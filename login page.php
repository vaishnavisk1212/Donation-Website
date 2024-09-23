<html>

<head>
    <title>Admin Login</title>
</head>

<body>

    <?php
// Database connection parameters
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "project";

// Create a database connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the login form was submitted
if (isset($_POST['login'])) {
    // Get the entered username and password
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    // Query the database to check if the admin credentials are valid
    $query = "SELECT * FROM admins WHERE username = '$admin_username' AND password = '$admin_password'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful and if the admin record exists
    if ($result && mysqli_num_rows($result) > 0) {
        // Admin login successful, redirect to admin panel or dashboard
        header("Location: admin_panel.php");
        exit();
    } else {
        // Invalid admin credentials, display an error message
        $error_message = "Invalid username or password";
    }
}
?>

        <h2>Admin Login</h2>
        <?php if (isset($error_message)): ?>
        <p>
            <?php echo $error_message; ?>
        </p>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <input type="submit" name="login" value="Login">
        </form>
</body>

</html>