<?php
// Change this to your connection info.
require_once 'auth.php';
include('db_connection.php');

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    // Could not get the data that should have been sent.
    exit('Please complete the registration form!');
}

// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
    // One or more values are empty.
    exit('Please complete the registration form');
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    exit('Email is not valid!');
}

if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
    exit('Username is not valid!');
}

if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
    exit('Password must be between 5 and 20 characters long!');
}

// Check if the account with that email exists.
if ($stmt = $conn->prepare('SELECT id FROM accounts WHERE email = ?')) {
    // Bind parameters and execute the query
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();

    // Check if the account with the email already exists
    if ($stmt->num_rows > 0) {
        // Email already exists
        header("Location: register.html?error=Email%20exists,%20please%20choose%20another");
        exit();
    } else {
        // Email doesn't exist, insert new account
        if ($stmt = $conn->prepare('INSERT INTO accounts (username, password, email, activation_code) VALUES (?, ?, ?, ?)')) {
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $uniqid = uniqid();
            $stmt->bind_param('ssss', $_POST['username'], $password, $_POST['email'], $uniqid);
            $stmt->execute();
            
            sleep(60);
            // Sending activation email
            $from = 'account@invity.co.uk';
            $subject = 'Invity login details';
            $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
            $activate_link = 'https://invity.co.uk/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid;
            $message = 'Please click the following link to login: <a href="https://invity.co.uk/login.html">https://invity.co.uk/login.html</a>';
            $message .= '<p>Your OTP code: ' . $uniqid . '</p>';
            
            mail($_POST['email'], $subject, $message, $headers);

            // Redirect to login.html with a success message
            header("Location: login.html?success=Registration%20successful.%20Please%20check%20your%20email%20for%20activation%20instructions.");
            exit(); // Ensure that no further code is executed after the redirect
        } else {
            // Something is wrong with the SQL statement
            echo 'Could not prepare statement!';
        }
    }
    $stmt->close();
} else {
    // Something is wrong with the SQL statement
    echo 'Could not prepare statement!';
}
$conn->close();
?>
