<?php
require_once(__DIR__ . "/globals.php");
session_start();
if (!isset($_SESSION['user_id'])) {
    send_400('You are missing session data (user_id). Please login and delete from the UI');
    exit();
}

//Initial validation of database
try {
    $db = _db();
} catch (Exception $ex) {
    send_500('Database failed - System under maintainance');
    echo json_encode($ex);
}


try {
    $id = $_SESSION['user_id'];
    $img_location = 'img/user/img_' . $id;


    $q = $db->prepare('DELETE FROM users WHERE user_id = :id');
    $q->bindValue(':id', $id);
    $q->execute();
    !unlink($img_location);
    session_destroy();
    send_200('Your user have now been deleted');
    exit();
} catch (PDOException $ex) {
    send_500('System under maintainance');
    echo "Speak to an adult";
}