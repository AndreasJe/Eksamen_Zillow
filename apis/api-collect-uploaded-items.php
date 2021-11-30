<?php
require_once(__DIR__ . "/globals.php");

// Validation of database connection
try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'Database failed - System under maintainance', 'error' => __LINE__]);
    exit();
}

// Getting all objects from items column
try {
    $id = $_SESSION['user_id'];
    $q = $db->prepare('SELECT * FROM items WHERE item_author_id = :item_author_id');
    $q->bindValue(':item_author_id', $id);
    $q->execute();
    $items = $q->fetchAll(PDO::FETCH_OBJ);
} catch (Exception $ex) {
    send_500('System under maintainance');
}