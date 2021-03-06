<?php

session_start();
require_once(__DIR__ . "/globals.php");

if (!isset($_POST['first_name'])) {
    send_400('first_name is missing ');
    exit();
}

if (!isset($_POST['last_name'])) {
    send_400('last_name is missing ');
    exit();
}

if (strlen($_POST['first_name']) < 3) {
    send_400('First name has to be a minimum of 3 characters ');
    exit();
}
if (strlen($_POST['first_name']) > 22) {
    send_400('First name cant exceed 22 characters');
    exit();
}
if (strlen($_POST['last_name']) < 3) {
    send_400('Last name has to be a minimum of 3 characters ');
    exit();
}
if (strlen($_POST['last_name']) > 22) {
    _res(400, ['Last name cant exceed 22 characters']);
    exit();
}


//Testing DB-Connection to distinguish the errors.
try {
    $db = _db();
} catch (Exception $ex) {
    send_500('Database failed - System under maintainance');
    echo json_encode($ex);
}



if (!empty($_POST['first_name']) && !empty($_POST['last_name'])) {

    //Handling Query and setting new session data afterwards.
    try {

        $q = $db->prepare('UPDATE users SET first_name = :firstname, last_name = :lastname WHERE user_id = :id');
        $q->bindValue(':id',  $_SESSION['user_id']);
        $q->bindValue(':firstname', $_POST['first_name']);
        $q->bindValue(':lastname', $_POST['last_name']);
        $q->execute();
        $row = $q->fetch();
        echo 'Number of users updated: ' . $q->rowCount();

        $_SESSION['first_name'] = $_POST['first_name'];
        $_SESSION['last_name'] = $_POST['last_name'];
        exit();
    } catch (PDOException $ex) {
        echo json_encode($ex);
        send_500('System under maintainance - Query failed');
        exit();
    }
}