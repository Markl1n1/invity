<?php
include('dashboard.php');
include('db_connection.php');

// First, check if the email and code exist.
if (isset($_GET['email'], $_GET['code'])) {
    // Verify the email and code against your database
    $stmt = $con->prepare('SELECT id FROM accounts WHERE email = ? AND activation_code = ?');
    $stmt->bind_param('ss', $_GET['email'], $_GET['code']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Email and code match, update the user's account as activated
        $stmt = $con->prepare('UPDATE accounts SET activation_code = ? WHERE email = ? AND activation_code = ?');
        $newcode = 'activated';
        $stmt->bind_param('sss', $newcode, $_GET['email'], $_GET['code']);
        $stmt->execute();
        echo 'Your account is now activated! You can now <a href="login.html">Login</a>!';
    } else {
        echo 'The account is already activated or doesn\'t exist!';
    }
} else {
    echo 'Invalid parameters.';
}

// Close your database connection
$stmt->close();
$con->close();
?>
