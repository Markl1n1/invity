<?php
// Replace 'your_hostname', 'your_username', 'your_password', and 'your_database' with your actual database credentials
$hostname = 'localhost';
$username = 'u639613218_root';
$password = 'B44bc1d0f5!';
$database = 'u639613218_register';

// Create a connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>