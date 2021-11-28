<?php
require_once('globals.php');

try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}


try {
    $q = $db->prepare('SELECT * FROM items ');
    $q->execute();
    $items = $q->fetchAll(PDO::FETCH_OBJ);
} catch (Exception $ex) {
    _res(500, ['info' => 'Items were not loaded', 'error' => __LINE__]);
}