<?php
require_once(__DIR__ . "/globals.php");

// Validation of database connection
try {
    $db = _db();
} catch (Exception $ex) {
    send_500('Database failed - System under maintainance');
    echo json_encode($ex);
}

// Getting all objects from items column
try {
    $id = $_SESSION['user_id'];
    $q = $db->prepare('SELECT * FROM items WHERE item_author_id = :item_author_id');
    $q->bindValue(':item_author_id', $id);
    $q->execute();
    $items = $q->fetchAll(PDO::FETCH_OBJ);
} catch (Exception $ex) {
    send_500('Database failed - System under maintainance');
    echo json_encode($ex);
}