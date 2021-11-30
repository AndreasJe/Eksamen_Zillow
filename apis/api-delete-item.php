<?php

require_once(__DIR__ . "/globals.php");

//Initial validation of database
try {
    $db = _db();
} catch (Exception $ex) {
    echo json_encode($ex);
    send_500('System under maintainance - DB connection failed');
}
//Variables defined and finding item by item_id 
//Deleting previous image before implementing new one..
try {
    $id = $_GET['item_id'];
    $img_location = 'img\products\user-listed\img_product_' . $id;
    $q = $db->prepare('DELETE FROM items WHERE item_id = :id');
    $q->bindValue(':id', $id);
    $q->execute();
    !unlink($img_location);
    header('Location: ' . $_SERVER['HTTP_REFERER']);

    exit();
} catch (PDOException $ex) {
    echo json_encode($ex);
    send_500('System under maintainance - Query failed');
}

//Response 500 means server error
function send_500($error_message)
{
    header('Content-Type: application/json');
    http_response_code(500);
    $response = ["Error" => $error_message];
    echo json_encode($response);
    exit();
}