<?php
require_once(__DIR__ . "/globals.php");

session_start();

//Initial validation of the phone number
if (!isset($_POST['phone_number'])) {
    echo "phone_number is missing";
    exit();
}
if (strlen($_POST['phone_number']) != 8) {
    echo "phone_number needs to be 8 characters";
    exit();
}

try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}


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
    exit();
} catch (Exception $ex) {
}