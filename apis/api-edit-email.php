<?php

session_start();
require_once(__DIR__ . "/globals.php");



// Validate User name

if (!isset($_POST['new_email']) && !isset($_POST['new_email'])) {
    _res(400, ['info' => 'Email required']);
    exit();
}
if (!filter_var($_POST['new_email'], FILTER_VALIDATE_EMAIL)) {
    _res(400, ['email is invalid']);
    exit();
}



//Testing DB-Connection to distinguish the errors.
try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

// Checking whether or not the new email has been confirmed
$confirmEmail = $_POST['confirm_email'];
$newEmail =  $_POST['new_email'];
$id = $_SESSION['user_id'];

if ($newEmail == $confirmEmail) {
    //Handling Query
    try {
        $q = $db->prepare('UPDATE users SET user_email = :useremail  WHERE user_id = :id');
        $q->bindValue(':id', $id);
        $q->bindValue(':useremail', $_POST['new_email']);
        $q->execute();
        $row = $q->fetch();
        echo 'Email has been changed: ' . $q->rowCount();
        $_SESSION['user_email'] = $_POST['new_email'];
    } catch (PDOException $ex) {
        echo $ex;
        echo 'No dice! ';
        exit();
    }
} else {
    _res(400, ['Emails dont match']);
}