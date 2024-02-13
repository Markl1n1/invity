<?php
// Include your database connection file or set up the connection here
include('db_connection.php');
// Assuming you have a database connection object $conn

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['activation_code'])) {
    $email = $_POST['email'];
    $activationCode = $_POST['activation_code'];

    // Validate and sanitize input to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);
    $activationCode = mysqli_real_escape_string($conn, $activationCode);

    // Fetch user information based on email
    $query = "SELECT id, email, activation_code, balance FROM accounts WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            // Verify the activation code
            if ($activationCode == $user['activation_code']) {
                // Activation code is correct, user is authenticated

                // You can store user information in session or perform other actions here
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];

                // Store balance in a session variable
                $_SESSION['balance'] = $user['balance'];

                // Redirect to the dashboard with the email in the URL
                header("Location: dashboard.php?email=" . urlencode($user['email']));
                exit();
            } else {
                // Activation code is incorrect
                echo "Invalid activation code";
            }
        } else {
            // User not found
            echo "User not exist, register account first";
        }
    } else {
        // Query execution failed
        echo "Query failed: " . mysqli_error($conn);
    }

    // Close the result set
    mysqli_free_result($result);
} else {
    // Invalid request method or missing parameters
    echo "Invalid request";
}

// Close the database connection
mysqli_close($conn);
?>
