<?php
include('db_connection.php');

session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['credential'])) {
    $email = $_POST['email'];
    $credential = $_POST['credential'];

    // Validate and sanitize input to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);
    $credential = mysqli_real_escape_string($conn, $credential);

    // Fetch user information based on email
    $query = "SELECT id, email, password, activation_code, balance FROM accounts WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            // Verify the credential (either password or activation code)
            if (password_verify($credential, $user['password']) || $credential == $user['activation_code']) {
                // Credential is correct, user is authenticated

                // Set necessary session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['username'] = $user['username']; // Assuming you have a 'username' column
                $_SESSION['balance'] = $user['balance'];

                // Redirect to the dashboard with the email in the URL
                header("Location: dashboard.php?email=" . urlencode($user['email']));
                exit();
            } else {
                // Credential is incorrect
                echo "Invalid credential";
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
