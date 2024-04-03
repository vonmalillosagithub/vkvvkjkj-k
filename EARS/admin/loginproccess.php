<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check credentials (You can replace this with your actual authentication logic)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Assuming you have a database connection
    require_once 'db_connection.php'; // Include your database connection script

    // Example query (replace it with your actual query)
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Login successful
        $_SESSION['username'] = $username;
        header("Location: users.php"); // Redirect to your Users page
        exit();
    } else {
        // Login failed
        $error = "Invalid username or password";
    }
}
?>
