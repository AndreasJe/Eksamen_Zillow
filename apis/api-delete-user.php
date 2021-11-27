<?php
require_once(__DIR__ . "/globals.php");

session_start();
try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}


try {
    $id = $_SESSION['user_id'];
    $img_location = 'img/user/img_' . $id;


    $q = $db->prepare('DELETE FROM users WHERE user_id = :id');
    $q->bindValue(':id', $id);
    $q->execute();
    echo 'Number of users deleted: ' . $q->rowCount();
    !unlink($img_location);
    session_destroy();
    exit();
} catch (PDOException $ex) {
    echo '{"info":"Speak to an adult!"}';
    exit();
}