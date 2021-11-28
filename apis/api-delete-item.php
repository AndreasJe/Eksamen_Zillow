<?php

require_once(__DIR__ . "/globals.php");

try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}


try {
    // Get ID from URL  
    $id = $_GET['item_id'];
    $img_location = 'img\products\user-listed\img_product_' . $_GET['item_id'];
    //SQL Statement - refers to user with Variables ":id"
    $q = $db->prepare('DELETE FROM items WHERE item_id = :id');
    //Replace placeholder ID with URL ID
    $q->bindValue(':id', $id);
    // Executing the change
    $q->execute();
    !unlink($img_location);
    header('Location: ' . $_SERVER['HTTP_REFERER']);

    exit();
} catch (PDOException $ex) {
    echo '{"info":"Speak to an adult!"}';
    exit();
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