<?php
session_start();
require_once('globals.php');
// TODO: Make sure the user is logged


// Validate
if (!isset($_POST['item_name'])) {
    http_response_code(400);
    echo 'item_name required';
    exit();
}
if (strlen($_POST['item_name']) < _ITEM_MIN_LEN) {
    http_response_code(400);
    echo 'item_name min ' . _ITEM_MIN_LEN . ' characters';
    exit();
}
if (strlen($_POST['item_name']) > _ITEM_MAX_LEN) {
    http_response_code(400);
    echo 'item_name max ' . _ITEM_MAX_LEN . ' characters';
    exit();
}

try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

try {
    $item_id = bin2hex(random_bytes(22));
    $item_name = $_POST['item_name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/img_"  . $item_id);

    $q = $db->prepare('INSERT INTO items VALUES(:item_id, :item_name)');
    $q->bindValue(':item_id',  $item_id);
    $q->bindValue(':item_name', $_POST['item_name']);
    $q->execute();
    echo $item_id;

    // Success
} catch (Exception $ex) {
    http_response_code(500);
    echo 'OOPS! i did it again' . __LINE__;
    exit();
}


exit();