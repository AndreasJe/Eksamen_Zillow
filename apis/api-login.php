<?php


require_once(__DIR__ . "/globals.php");


// Validate email
if (!isset($_POST['user_email'])) {
    send_400('We need a email to find your user! Please enter your email in the form');
    exit();
}
if (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
    send_400('We need a valid email to find your user. Please enter your email correctly in the form');
    exit();
}

try {
    $db = _db();
} catch (Exception $ex) {
    send_500('System under maintainance');
    exit();
}

// Validate password
if (!isset($_POST['user_password'])) {
    send_400('We need your password to create a user for you!');
    exit();
}
if (strlen($_POST['user_password']) < 2) {
    send_400('Password has to be a minimum of 2 characters');
    exit();
}
if (strlen($_POST['user_password']) > 22) {
    send_400('Password cant exceed 22 characters');
    exit();
}

try {

    $q = $db->prepare('SELECT * FROM users WHERE user_email = :user_email');
    $q->bindValue(':user_email', $_POST['user_email']);
    $q->execute();
    $row = $q->fetch();



    // If row is not empty - Continue. If empty do else )
    if (!empty($row)) {
        // Verify password input string with hashed password in database row.
        if (password_verify($_POST['user_password'], $row['user_password'])) {

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
            send_200('Welcome! You are now logged in');
        } else {
            send_400('Password is not valid');
        }
        // If $row is empty, the user doesn't exist.
    } else {
        send_400('This user does not exist');
    }
} catch (Exception $ex) {
    send_500('System under maintainance');
    echo "Speak to an adult";
}


// function to manage responding in case of an error
function send_400($error_message)
{
    header('Content-Type: application/json');
    http_response_code(400);
    $response = ["info" => $error_message];
    echo json_encode($response);
    exit();
}

function send_500($error_message)
{
    header('Content-Type: application/json');
    http_response_code(500);
    $response = ["info" => $error_message];
    echo json_encode($response);
    exit();
}

function send_200($error_message)
{
    header('Content-Type: application/json');
    http_response_code(200);
    $response = ["info" => $error_message];
    echo json_encode($response);
    exit();
}