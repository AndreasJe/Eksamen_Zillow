<?php
session_start();
require_once(__DIR__ . "/globals.php");

//Initial validation of the inputs
if (empty($_POST['item_name'])) {
    send_400('item_name is missing ');
    exit();
}
if (!isset($_POST['item_price'])) {
    send_400('item_price is missing ');
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

if (!isset($_POST['item_location'])) {
    send_400('item_location is missing ');
    exit();
}
if (!isset($_POST['item_author'])) {
    send_400('item_author is missing ');
    exit();
}

//Initial validation of database
try {
    $db = _db();
} catch (Exception $ex) {
    echo json_encode($ex);
    send_500('System under maintainance - DB connection failed');
}



//Binding values to item and moving image to appropiate folder.
try {
    $id = $_GET['item_id'];


    $db->beginTransaction();

    // Changing item_name
    $q = $db->prepare('UPDATE items SET item_name = :item_name WHERE item_id = :id');
    $q->bindValue(':id', $id);
    $q->bindValue(':item_name', $_POST['item_name']);
    $q->execute();

    // Changing item_price
    $q = $db->prepare('UPDATE items SET item_price = :item_price WHERE item_id = :id');
    $q->bindValue(':id', $id);
    $q->bindValue(':item_price', $_POST['item_price']);
    $q->execute();

    // Changing item_features
    $q = $db->prepare('UPDATE items SET item_features = :item_features WHERE item_id = :id');
    $q->bindValue(':id', $id);
    $q->bindValue(':item_features', $_POST['item_features']);
    $q->execute();

    // Changing item_price
    $q = $db->prepare('UPDATE items SET item_location = :item_location WHERE item_id = :id');
    $q->bindValue(':id', $id);
    $q->bindValue(':item_location', $_POST['item_location']);
    $q->execute();

    // Changing item_price
    $q = $db->prepare('UPDATE items SET item_author = :item_author WHERE item_id = :id');
    $q->bindValue(':id', $id);
    $q->bindValue(':item_author', $_POST['item_author']);
    $q->execute();

    $db->commit();
    move_uploaded_file($_FILES['item_image']['tmp_name'], "../img/products/user-listed/img_product_" . $id);
    send_200('Item information has been changed');
    exit();
} catch (PDOException $ex) {

    $db->rollBack();
    echo json_encode($ex);
    send_500('System under maintainance');
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

//Response 400 means Client error
function send_400($error_message)
{
    header('Content-Type: application/json');
    http_response_code(400);
    $response = ["Error" => $error_message];
    echo json_encode($response);
    exit();
}

//Response 400 means OK error
function send_200($error_message)
{
    header('Content-Type: application/json');
    http_response_code(200);
    $response = ["Info" => $error_message];
    echo json_encode($response);
    exit();
}