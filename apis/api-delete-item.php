<?php

require_once(__DIR__ . "/globals.php");

//Initial validation of database
try {
    $db = _db();
} catch (Exception $ex) {
    send_500('Database failed - System under maintainance');
    echo json_encode($ex);
}
//Variables defined and finding item by item_id 
//Deleting previous image before implementing new one..
try {
    $id = $_GET['item_id'];
    $img_location = '..\img\products\user-listed\img_product_' . $id;
    $q = $db->prepare('DELETE FROM items WHERE item_id = :id');
    $q->bindValue(':id', $id);
    $q->execute();
    !unlink($img_location);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
} catch (PDOException $ex) {
    send_500('Database failed - System under maintainance');
    echo json_encode($ex);
}