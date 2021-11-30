<?php
require_once(__DIR__ . "/globals.php");

//Initial validation of the parameter
if (!isset($_POST['user_email'])) {
    echo "We need an email to find your user";
    exit();
}

//Testing DB-Connection to distinguish the errors.
try {
    $db = _db();
} catch (Exception $ex) {
    echo json_encode($ex);
    send_500('System under maintainance - DB connection failed');
}


//Handling Query and setting new verification_key and session data afterwards.
try {
    $email = $_POST['user_email'];

    $q = $db->prepare('SELECT * FROM users WHERE user_email = :email');
    $q->bindValue(':email', $email);
    $q->execute();
    $row = $q->fetch();
    echo 'Number of users found: ' . $q->rowCount();
    $verification_key = $row['forgot_pass_key'];

    //Validating the verification key

    if (!isset($row['forgot_pass_key'])) {
        echo '';
        send_400('Forgot_pass_key is not present in Database - Create new user or contact your administrator)');
        exit();
    }
    if (strlen($row['forgot_pass_key']) != 32) {
        send_400('mmm... suspicious (key is not 32 chars)');
        exit();
    }

    //Sending email with link

    $_to_email =  $_POST['user_email'];
    $_message = file_get_contents('../emails/ForgotPassword_Template.html');
    $_subject = "Reset your password";
    $_message = str_replace("%verification_key%", $verification_key, $_message);

    require_once(__DIR__ . "/../private/send-email.php");

    exit();
} catch (PDOException $ex) {
    echo json_encode($ex);
    send_500('System under maintainance - Query failed');
    exit();
}

//Response 500 means server error
function send_500($error_message)
{
    header('Content-Type: application/json');
    http_response_code(500);
    $response = ["Error" => $error_message];
    echo json_encode($response);
    exit();
}

//Response 400 means Client error
function send_400($error_message)
{
    header('Content-Type: application/json');
    http_response_code(400);
    $response = ["Error" => $error_message];
    echo json_encode($response);
    exit();
}

//Response 400 means OK error
function send_200($error_message)
{
    header('Content-Type: application/json');
    http_response_code(200);
    $response = ["Info" => $error_message];
    echo json_encode($response);
    exit();
}