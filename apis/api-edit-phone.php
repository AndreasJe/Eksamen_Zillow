<?php
session_start();
require_once(__DIR__ . "/globals.php");

//Initial validation of the parameter
if (!isset($_POST['phone_number'])) {
    echo "mmm... suspicious (No number has been found)";
    exit();
}
if (strlen($_POST['phone_number']) != 8) {
    echo "Sry, this needs to be a danish number (8 digits)";
    exit();
}



//Testing of DB connection, before query
try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}



//Applying the data
try {
    $q = $db->prepare('UPDATE users SET user_phone = :phone WHERE user_id = :userid');
    $q->bindValue(':userid', $_SESSION['user_id']);
    $q->bindValue(':phone', $_POST['phone_number']);
    $q->execute();
    $user = $q->fetch();
    http_response_code(200);
    $_SESSION['user_phone'] = $_POST['phone_number'];
    echo $user  . ' phonenumber has been added to user with id: ' . $_SESSION['user_id'];
} catch (PDOException $ex) {
    echo $ex;
    http_response_code(500);
    echo "That didnt work - try again, or contact an adult";
}