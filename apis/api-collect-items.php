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
    $q = $db->prepare('SELECT * FROM items ');
    $q->execute();
    $items = $q->fetchAll(PDO::FETCH_OBJ);
} catch (Exception $ex) {
    send_500('Database failed - System under maintainance');
    echo json_encode($ex);
}