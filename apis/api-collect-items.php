<?php
require_once(__DIR__ . "/globals.php");

// Validation of database connection
try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'Database failed - System under maintainance', 'error' => __LINE__]);
}

// Getting all objects from items column
try {
    $q = $db->prepare('SELECT * FROM items ');
    $q->execute();
    $items = $q->fetchAll(PDO::FETCH_OBJ);
} catch (Exception $ex) {
    _res(500, ['info' => 'Items were not loaded', 'error' => __LINE__]);
}