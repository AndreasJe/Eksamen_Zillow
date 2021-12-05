<?php
session_start();
require_once(__DIR__ . "/globals.php");


//Initial validation of database
try {
    $db = _db();
} catch (Exception $ex) {
    send_500('Database failed - System under maintainance');
}



//Binding values to item and moving image to appropiate folder.
try {
    //Getting item_id from URL.
    $id = $_GET['item_id'];

    //Transaction initiated.
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

    // Setting new time in item_log ( usable for "Last change")
    $now = new DateTime();
    $q = $db->prepare('UPDATE items SET item_log = :item_log WHERE item_id = :id');
    $q->bindValue(':id', $id);
    $q->bindValue(':item_log', $now);
    $q->execute();

    //Transaction Commit, and move picture image afterwards
    $db->commit();
    move_uploaded_file($_FILES['item_image']['tmp_name'], "../img/products/user-listed/img_product_" . $id);
    send_200('Item information has been changed');
    //Forcing a refresh - since we don't use an Ajax function
    header("Refresh:0");
} catch (PDOException $ex) {

    $db->rollBack();
    echo json_encode($ex);
    send_500('System under maintainance');
}