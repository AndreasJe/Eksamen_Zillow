<?php


require_once(__DIR__ . "/globals.php");


// Validate email
if (!isset($_POST['email'])) {
    send_400('email is required');
    $error = "We need your email to create a user for you! Please enter your email in the form";
    exit();
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    send_400('email is invalid');
    $error = "We need a valid email to verify your user. Please enter your email correctly in the form";
    exit();
}

try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

try {

    $q = $db->prepare('SELECT * FROM users WHERE user_email = :user_email');
    $q->bindValue(':user_email', $_POST['email']);
    $q->execute();
    $row = $q->fetch();



    // If row is not empty - Continue. If empty do else )
    if (!empty($row)) {
        // Verify password input string with hashed password in database row.
        if (password_verify($_POST['password'], $row['user_password'])) {

            //Start SESSION and assign values from database
            session_start();
            $_SESSION['user_verified'] = $row['verified'];
            $_SESSION['user_email'] = $row['user_email'];
            $_SESSION['user_password'] = $row['user_password'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['user_phone'] = $row['user_phone'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['forgot_pass_key'] = $row['forgot_pass_key'];
            $_SESSION['verification_key'] = $row['verification_key'];
            http_response_code(200);
            echo "Welcome! You are now logged in";
        } else {
            http_response_code(400);
            echo "ERROR: Password is not valid";
        }
        // If $row is empty, the user doesn't exist.
    } else {
        http_response_code(400);
        echo "ERROR: This user does not exist";
    }
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
    echo "Speak to an adult";
}