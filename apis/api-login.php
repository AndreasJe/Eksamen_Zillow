<?php


require_once('globals.php');


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
            $_SESSION['user_id'] = $row['user_id'];
            http_response_code(200);
        } else {
            echo "ERROR: Password is not valid";
        }
        // If $row is empty, the user doesn't exist.
    } else {
        echo "ERROR: This user does not exist";
    }
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
    echo "Speak to an adult";
}