<?php
session_start();
require_once(__DIR__ . "/globals.php");

//Initial validation of the passwords
if (!isset($_POST['new_password'])) {
    send_400('We need your password to create a user for you!');
    exit();
}
if (strlen($_POST['new_password']) < 2) {
    send_400('Both passwords needs to be longer than 2 characters');
    exit();
}
if (strlen($_POST['new_password']) > 22) {
    send_400('Both password cant exceed 22 characters');
    exit();
}
if (!isset($_POST['confirm_password'])) {
    send_400('You need to confirm your password!');
    exit();
}
if (strlen($_POST['confirm_password']) < 2) {
    send_400('Both passwords needs to be longer than 2 characters');
    exit();
}
if (strlen($_POST['confirm_password']) > 22) {
    send_400('Both password cant exceed 22 characters');
    exit();
}

//Initial validation of database
try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'Database failed - System under maintainance', 'error' => __LINE__]);
}

$id = $_SESSION['user_id'];
$newpass = $_POST['new_password'];
$newpasshashed = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
$confirmpass = $_POST['confirm_password'];

//Changing password if there is a match - or else report error below
if ($newpass == $confirmpass) {
    try {
        $q = $db->prepare('UPDATE users SET user_password = :new_password WHERE user_id = :id');
        $q->bindValue(':id', $id);
        $q->bindValue(':new_password', $newpasshashed);
        $q->execute();

        send_200('New password has been assigned');
        exit();
    } catch (PDOException $ex) {
        echo json_encode($ex);
        send_500('System under maintainance');
    }
} else {
    send_400('Password does not match.');
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