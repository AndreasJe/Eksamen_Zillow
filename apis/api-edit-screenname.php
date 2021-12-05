<?php

session_start();
require_once(__DIR__ . "/globals.php");



// Validate inputs
if (!isset($_POST['user_name'])) {
    send_400('user_name is missing ');
    exit();
}

if (strlen($_POST['user_name']) < 3) {
    send_400('user_name has to be a minimum of 3 characters ');
    exit();
}
if (strlen($_POST['user_name']) > 22) {
    send_400('user_name cant exceed 22 characters');
    exit();
}

//Testing DB-Connection to distinguish the errors.
try {
    $db = _db();
} catch (Exception $ex) {
    send_500('System under maintainance - DB connection failed');
}

//Handling Query
if (!empty($_POST['user_name'])) {
    try {
        $q = $db->prepare('UPDATE users SET user_name = :username  WHERE user_id = :id');
        $q->bindValue(':id', $_SESSION['user_id']);
        $q->bindValue(':username', $_POST['user_name']);
        $q->execute();
        $row = $q->fetch();
        echo 'Number of users updated: ' . $q->rowCount();
        $_SESSION['user_name'] = $_POST['user_name'];
        send_200('New screenname has been assigned');
    } catch (PDOException $ex) {
        echo json_encode($ex);
        send_500('System under maintainance - Query failed');
        exit();
    }
}