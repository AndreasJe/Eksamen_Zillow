<?php

session_start();
require_once(__DIR__ . "/globals.php");



// Validate User name

if (!isset($_POST['user_name'])) {
    _res(400, ['info' => 'Last Name required']);
    exit();
}

if (strlen($_POST['user_name']) < 3) {
    _res(400, ['First name has to be a minimum of 3 characters']);
    exit();
}
if (strlen($_POST['user_name']) > 22) {
    _res(400, ['First name cant exceed 22 characters']);
    exit();
}

//Testing DB-Connection to distinguish the errors.
try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

//Handling Query
if (!empty($_POST['user_name'])) {
    try {
        $q = $db->prepare('UPDATE users SET user_name = :username  WHERE user_id = :id');
        $q->bindValue(':id', $_SESSION['user_id']);
        $q->bindValue(':username', $_POST['user_name']);
        $q->execute();
        $row = $q->fetch();
        echo 'Email has been changed: ' . $q->rowCount();
        $_SESSION['user_name'] = $_POST['user_name'];
    } catch (PDOException $ex) {
        echo $ex;
        echo 'No dice! ';
        exit();
    }
}