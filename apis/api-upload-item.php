<?php
session_start();
require_once('globals.php');

try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

try {
    $item_id = bin2hex(random_bytes(16));
    $user = "Arthur";
    $created_date = date("Y-m-d H:i:s");

    $q = $db->prepare('INSERT INTO items VALUES(:item_id, :item_name, :item_price, :item_location, :item_features, :item_log ,:item_author)');
    $q->bindValue(':item_id',  $item_id);
    $q->bindValue(':item_name', $_POST['item_name']);
    $q->bindValue(':item_price', $_POST['item_price']);
    $q->bindValue(':item_location', $_POST['item_location']);
    $q->bindValue(':item_features', $_POST['item_features']);
    $q->bindValue(':item_log', $created_date);
    $q->bindValue(':item_author', $user);
    $q->execute();
    // Success
    move_uploaded_file($_FILES['image']['tmp_name'], "../img/products/user-listed/img_product_" . $item_id);
} catch (Exception $ex) {
    echo json_encode($ex);
    http_response_code(500);
    exit();
};