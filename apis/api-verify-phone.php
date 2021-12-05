<?php
require_once(__DIR__ . "/globals.php");
session_start();

//Initial validation of the inputs
if (empty($_POST['phone_number'])) {
    send_400('mmm... suspicious (No number has been found) ');
    exit();
}
if (!isset($_POST['phone_number'])) {
    send_400('mmm... suspicious (No number has been found) ');
    exit();
}
if (strlen($_POST['phone_number']) != 8) {
    send_400('Sry, this needs to be a danish number (8 digits) ');
    exit();
}

// Validation of database connection
try {
    $db = _db();
} catch (Exception $ex) {
    send_500('Database failed - System under maintainance');
    echo json_encode($ex);
}

//Looking for user with id, and fetching verification_key from row.
try {
    $id = $_SESSION['user_id'];

    $q = $db->prepare('SELECT * FROM users WHERE user_id = :user_id');
    $q->bindValue(':user_id', $id);
    $q->execute();
    $row = $q->fetch();

    $key = $row['authentication_code'];
    $to_phone = $_POST['phone_number'];
    $sms_content = " Hello user! Here is your authentication code: " . $key;
    require_once(__DIR__ . "/../private/send-sms.php");
    send_200('Success: We have found your user. Message is on the way!');
    exit();
} catch (Exception $ex) {
    echo $ex;
    send_500('That didnt work - try again, or contact an adult');
}