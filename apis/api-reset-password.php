<?php
require_once("globals.php");
session_start();

//Initial validation of the parameter
if (!isset($_GET['key'])) {
    send_400('key is not present');
    exit();
}
if (strlen($_GET['key']) != 32) {
    send_400('mmm... suspicious (key is not 32 chars');
    exit();
}
//Initial validation of the passwords
if (!isset($_POST['new_password'])) {
    send_400('new_password is needed');
    exit();
}
if (!isset($_POST['confirm_password'])) {
    send_400('confirm_password is needed');
    exit();
}

if (strlen($_POST['new_password']) < 8 || strlen($_POST['new_password']) > 22) {
    send_400('Password should be min 8 characters and max 22 characters');
    exit();
}
//Initial advanced validation of the passwords
if (!preg_match("/\d/", $_POST['new_password'])) {
    send_400('Password should contain at least one digit');
    exit();
}
if (!preg_match("/[A-Z]/", $_POST['new_password'])) {
    send_400('Password should contain at least one Capital Letter');
    exit();
}
if (!preg_match("/[a-z]/", $_POST['new_password'])) {
    send_400('Password should contain at least one small Letter');
    exit();
}
if (!preg_match("/\W/", $_POST['new_password'])) {
    send_400('Password should contain at least one special character');
    exit();
}
if (preg_match("/\s/", $_POST['new_password'])) {
    send_400('Password should not contain any white space');
    exit();
}


//Initial validation of the database connection, before we proceed
try {
    $db = _db();
} catch (Exception $ex) {
    send_500('System under maintainance');
}


//Verification_key is used to find user.
try {
    $pass_key = $_GET['key'];
    $newpass = $_POST['new_password'];
    $newpasshashed = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    $confirmpass = $_POST['confirm_password'];

    //Change password if they match
    if ($newpass == $confirmpass) {
        $q = $db->prepare('UPDATE users SET user_password = :new_password WHERE forgot_pass_key = :pass_key');
        $q->bindValue(':pass_key', $pass_key);
        $q->bindValue(':new_password', $newpasshashed);
        $q->execute();
        echo "Number of users updated: " . $q->rowCount();

        //Binding a new verification key if change has been done
        if ($q->rowCount() > 0) {
            $new_verification_key = bin2hex(random_bytes(16));

            $q2 = $db->prepare('UPDATE users SET forgot_pass_key = :new_pass_key WHERE forgot_pass_key = :pass_key');
            $q->bindValue(':pass_key', $pass_key);
            $q2->bindValue(':new_pass_key', $new_verification_key);
            $q2->execute();
            send_200('New verification key has been assigned');
            exit();
        } else {

            send_500('Signing new key failed');
            exit();
        }
    } else {
        send_500('ERROR: Password does not match.');
        exit();
    }
} catch (PDOException $ex) {
    http_response_code(500);
    $error = 'Something went wrong';
    echo json_encode($ex);
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