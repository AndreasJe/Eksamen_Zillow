<?php
session_start();
require_once(__DIR__ . "/globals.php");

//Initial validation of the inputs
if (!isset($_POST['item_name'])) {
    send_400('item_name is missing ');
    exit();
}
if (!isset($_POST['item_price'])) {
    send_400('item_price is missing ');
    exit();
}
if (!isset($_POST['item_location'])) {
    send_400('item_location is missing ');
    exit();
}
if (!strlen($_POST['item_features']) > 0) {
    send_400('item_features is missing ');
    exit();
}
if (!is_uploaded_file($_FILES['item_image']['tmp_name'])) {
    send_400('item_img is missing ');
    exit();
}

//Initial validation of database
try {
    $db = _db();
} catch (Exception $ex) {
    send_500('Database failed - System under maintainance');
    echo json_encode($ex);
}

//Binding values to item and moving image to appropiate folder.
try {
    $item_id = bin2hex(random_bytes(16));
    $user_id = $_SESSION['user_id'];
    $user = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
    $created_date = date("Y-m-d H:i:s");
    $q = $db->prepare('INSERT INTO items VALUES(:item_id, :item_name, :item_price, :item_location, :item_features, :item_log ,:item_author, :item_author_id )');
    $q->bindValue(':item_id',  $item_id);
    $q->bindValue(':item_name', $_POST['item_name']);
    $q->bindValue(':item_price', $_POST['item_price']);
    $q->bindValue(':item_location', $_POST['item_location']);
    $q->bindValue(':item_features', $_POST['item_features']);
    $q->bindValue(':item_log', $created_date);
    $q->bindValue(':item_author', $user);
    $q->bindValue(':item_author_id', $user_id);
    move_uploaded_file($_FILES['item_image']['tmp_name'], "../img/products/user-listed/img_product_" . $item_id);
    $q->execute();
    send_200('Success: Item was uploaded !');
} catch (PDOException $ex) {
    echo json_encode($ex);
    send_500('System under maintainance - Query failed');
}