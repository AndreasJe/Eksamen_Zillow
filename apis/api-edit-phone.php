<?php
session_start();
require_once(__DIR__ . "/globals.php");

//Initial validation of the parameter
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



//Testing of DB connection, before query
try {
    $db = _db();
} catch (Exception $ex) {
    send_500('Database failed - System under maintainance');
    echo json_encode($ex);
    exit();
}



//Applying the data - updating phone column in user row
try {
    $q = $db->prepare('UPDATE users SET user_phone = :phone WHERE user_id = :userid');
    $q->bindValue(':userid', $_SESSION['user_id']);
    $q->bindValue(':phone', $_POST['phone_number']);
    $q->execute();
    $user = $q->fetch();
    http_response_code(200);
    $_SESSION['user_phone'] = $_POST['phone_number'];
    send_200('Success: You have registered your new phone!');
} catch (PDOException $ex) {
    echo $ex;
    send_500('That didnt work - try again, or contact an adult');
}